<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Conflict;
use App\Models\Pattern;
use App\Models\Product;
use Illuminate\Http\Request;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $pattern;
    public $conflicts;
    public $points;
    public function __construct($pattern,$points,$conflicts)
    {
        $this->pattern=$pattern;
        $this->points=$points;
        $this->conflicts=$conflicts;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $products = $this->prepairProducts($this->pattern,$this->points);

        $products = $this->segregateProducts($products,$this->conflicts);
        $this->storeProducts($products, $this->pattern);
    }


    private function prepairProducts($pattern,$points)
    {
        $preProducts = collect([$pattern->name]);
//        $pois=$points->chunk(24);
//        dd($points);
        foreach ($points as $value){
            if(isset($value->points)){
                if($value->pivot->unique != 1){
                    $nup = array();
                    $nup2 = array();
                    foreach($value->points as $k=>$v){
                        $notUnPoi = array();
                        array_push($nup, [$v]);
                        foreach ($value->points as $point){
                            if($v<=$point){
                                array_push($notUnPoi, $point);

                                //array_push($nup2,$notUnPoi);
                            }
                        }


                        array_push($nup,$notUnPoi);

                    }
//                    dd($nup);
                    $prd = collect($nup);
//                    dd($prd);
                    $count = count($prd->max());
//                    dd($count);
                    list($underThree, $equalOrAboveThree) = $prd->partition(function ($i) use ($count){
                        return count($i) <= $count-2;

                    });
                    $underThree= $underThree->crossJoin($underThree)->unique();
//                    dd($equalOrAboveThree);
//                    dd($nup);
                    $pep = array();

                    foreach ($underThree as $ko=>$val){

                        array_push($pep, collect($val)->flatten()->sortBy('id')->unique());

                    }

                    foreach ($equalOrAboveThree as $q=>$w){

                        $pep=  collect($pep)->push(collect($w)->unique());
                    }

                    $unique = $pep->unique();
                    while($unique->duplicates()->count()!=0){
                        $unique = $unique->unique();
                    }


                    /*
                     * TODO: Rebuild collection to unique points and non-duplicate points
                     * */

//                   dd($unique);
                    $preProducts= $preProducts->crossJoin($unique);
//                        dd($preProducts);
                } else {
                    $poi = collect();
                    foreach ($value->points as $point){
                        $poi -> push($point);
                    }
                    $preProducts= $preProducts->crossJoin($poi);
                }
            }else {
                $preProducts=$preProducts->crossJoin($value->title);
            }
        }
        while($preProducts->duplicates()->count()!=0){
            $preProducts = $preProducts->unique();
        }
        //ns - not segregate
        $nsProd = array();
        foreach ($preProducts as $preProduct){
//            dd($preProduct);
            $p = collect($preProduct);
            array_push($nsProd, $p->flatten());

        }
//dd($nsProd);
        return $nsProd;
    }

    private function segregateProducts($products, $conflicts)
    {

        foreach ($products as $key=>$product){
            foreach($product as $value){
                $p = array();
                if(isset($value->index)){
                    foreach ($conflicts as $conflict){

                        if($value->id==$conflict->first_point_id or $value->id==$conflict->second_point_id){
                            array_push($p,$value->id);
                        }

                    }
                    if (count($p) == 2){
                        unset($products[$key]);
                    }
                }
            }
        }

        return $products;
    }

    private function storeProducts($products, $pattern)
    {
//        dd($products);
        foreach ($products as $product){
            $storedProduct = new Product();
            $storedProduct->fabric()->associate($pattern->fabric->id);
            $storedProduct->pattern()->associate($pattern->id);
            $index = "";
            $desc = "";
//dd($product);
            foreach($product as $key=>$value){

//                dd($product);
//                dd(gettype($value));
                if(gettype($value)!="string"){
//                    dd($product[$key-1]);
                    if(isset($product[$key-1]->guide_id) and $product[$key-1]->guide_id==$product[$key]->guide_id){
                        // $value->index = '-'.$value->index;
                        $index = !empty($value->index) ?$index ."-". $value->index : $index . '' ;
                    } else {
                        $index = !empty($value->index) ?$index ." ". $value->index : $index . '' ;
                    }
                    $desc = !empty($value->description) ? $desc ." ". $value->description : $desc .'';

                } else {
                    $index = $index . $value;
                }
            }
            $storedProduct->fill([
                'index'=>$index,
                'description'=>$desc,
                'seo_title'=>'Купить кабель '.$index,
                'seo_description'=>'Купить кабель c'.$desc,

            ]);
            $storedProduct->save();
            foreach($product as $key=>$value) {
                if(isset($value->index)) {
                    $storedProduct->points()->attach($value->id);
                }
            }
        }
        return 'success';
    }
}

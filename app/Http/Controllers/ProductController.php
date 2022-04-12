<?php

namespace App\Http\Controllers;

use App\Models\Conflict;
use App\Models\Pattern;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /*
     * TODO::To post and attach parametres (pattern id)
     * */
   public function __invoke(Request $request)
   {
       $pattern = Pattern::whereId($request->pattern)->first();
       $points = collect($pattern->constants)
           ->merge(collect($pattern->guides))
           ->sortBy('pivot.index');
       $conflicts = Conflict::whereHas('pattern',  function ($query) use ($pattern) {
           $query->where('id', '=' ,$pattern->id);
       })->orHas('pattern','<',1)->get();
       $products = $this->prepairProducts($pattern,$points);

       $products = $this->segregateProducts($products,$conflicts);
       return $this->storeProducts($products, $pattern);


   }



    private function prepairProducts($pattern,$points)
    {
        $preProducts = collect([$pattern->name]);

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
                    $prd = collect($nup);
            //        dd($prd);
                    $count = count($prd->max());
//                    dd($count);
                    list($underThree, $equalOrAboveThree) = $prd->partition(function ($i) use ($count){
                        return count($i) <= $count-2;

                    });
                    $underThree= $underThree->crossJoin($underThree)->unique();
                    //dd($equalOrAboveThree);
                    //dd($nup);
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


//                    dd($unique);
                    $preProducts= $preProducts->crossJoin($unique);

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
        foreach ($products as $product){
            $storedProduct = new Product();
            $storedProduct->fabric()->associate($pattern->fabric->id);
            $storedProduct->pattern()->associate($pattern->id);
            $index = "";
            $desc = "";

            foreach($product as $key=>$value){
                if(isset($value->index)){

                    $index = $index ." ". $value->index;
                    $desc = $desc ." ". $value->description;
                } else {
                    $index = $index ." ". $value;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): ProductsResource
    {
        $products = Product::where('pattern_id','=',$request->pattern)->with([]);
        return new ProductsResource($products->paginate($data['limit'] ?? null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): ProductResource
    {
        $product->load([

            'points'
        ]);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

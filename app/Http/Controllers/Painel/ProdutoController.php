<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

use Illuminate\Support\MessageBag;



class ProdutoController extends Controller
{
  private $product;
    private $totalPage=3;

    public function __construct(Product $product){
      $this->product = $product;
    }

    public function index(){
      $products = $this->product->paginate($this->totalPage);

      $title = 'listagem';

      return view('painel.products.index',compact('products','title'));
    }


    public function create(){
      $title = "cadastro";

      $category = ['eletro','info','boia'];

      return view('painel.products.create',compact('title','category'));
    }

    public function store(ProductFormRequest $request){

      $request->all();

      //validacion
      // $this->validate($request, $this->product->rules);
    //   $validatedData = $request->validate([
    //     'name'      => 'required|min:2|max:100',
    //     'number'    => 'required|min:1|max:15|numeric',
    //     'category'  => 'required',
    //     'descri'    => 'min:3|max:1000',
    // ]);


      // dd($request);
      $dataForm = $request->except('_token');
      $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1 ;

      $insert = $this->product->insert($dataForm);
          if($insert){
            return redirect('painel/produtos/');
          }else{
            return redirect()->back;
          }
          // if($insert){
          //   return redirect()->route(produtos.index);
          // }else{
          //   return redirect()->route(produtos.create);
          // }
    }




    public function tests(){

      // $insert = $this->product->create([
      //   'name'      =>  'bolacha do righi',
      //   'number'    =>   2,
      //   'active'    =>   false,
      //   'image'    =>   'lalala.png',
      //   'category'  =>  'eletro',
      //   'descri'    =>  'descriiiii'
      // ]);
      //     if($insert){
      //       return 'foi... id:'.$insert->id.'<br>nome: '.$insert->name;
      //     }else{
      //       return 'n foi';
      //     }
      //
      // $prod = $this->product;
      // $prod->name = 'bolacha';
      // $prod->number = 23;
      // $prod->active = true;
      // $prod->image = 'lalala.png';
      // $prod->category = 'eletro';
      // $prod->descri = 'eiubaicubaicubaicuabciaeucbaiuecb';
      // $insert = $prod->save();
      // if($insert){
      //       return 'foi';
      //     }else{
      //       return 'n foi';
      //     }

      //update================================================================
      //
      // $prod = $this->product->find(5);
      // // dd($prod->name);
      // $update = $prod->update([
      //   'name' => 'updatade',
      //   'number' => 2,
      //   'active' => true,
      // ]);
      //
      // if($update){
      //   return 'atualizdo';
      // }else{
      //   return 'erro ao atualizar';
      // }

      //update alternativo ================================================================

      // $update = $this->product
      //                       ->where('number',2)
      //                       ->update([
      //                                 'name' => 'cacetinho do rigui',
      //                                 'number' => 1,
      //                                 'active' => true,
      //                               ]);
      // if(!$update){return 'erro ao atualizar'; exit;}
      // return 'atualizado!!!!!!';


      //deletarrrr=========================================================================

      // $prod = $this->product->find(6);
      // $delete = $prod->delete();
      // if(!$delete){return 'error'; exit;}
      // return 'sucesso!';


      //deletar alternativo ++++++++++++++++======================================================

      $delete =  $this->product
                      ->where('number',7)
                      ->delete();
      if(!$delete){return 'error'; exit;}
      return 'deletado';





    }

    public function edit($id){
      $product = $this->product->find($id);

      $title = "editar produto: ".$product->name;
      $category = ['eletro','info','boia'];

      return view('painel.products.create-edit', compact('title','category','product'));

    }

    public function update(ProductFormRequest $request, $id){
      $dataForm = $request->all();

      $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1 ;

      $product = $this->product->find($id);
      $update = $product->update($dataForm);
      if(!$update){
        return redirect()->route('produtos.edit',$id)->with(['errors'=>'falha ao ']);
        exit;
      }
      return redirect()->route('produtos.index');
    }


    public function show($id)
    {
      $product = $this->product->find($id);
      $title = "ver produto: ".$product->name;

      return view('painel.products.view-products', compact('title','product'));

    }

    public function destroy($id){
        $product = $this->product->find($id);

        $delete = $product->delete();

        if(!$delete){
          return redirect()->route('produtos.show',$id)->with(['errors'=>'falha ao DELETARRR']);
          exit;
        }
        return redirect()->route('produtos.index');
    }
}

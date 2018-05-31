<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Articles;
use App\Models\Admin\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');
        $count = DB::table('articles')->count();
        $page_count = $request->input('page_count',5);
        $articles = DB::table('articles');
            if(isset($search) && !empty($search)){
            $articles -> where('title','like','%'.$search.'%');
        }  
            $data = $articles->orderBy('id','asc')->paginate($page_count);
            return view('Admin.Article.index',['title'=>'文章列表','count'=>$count,'data'=>$data,'count'=>$count,'search'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Article.create',['title'=>'文章添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        //获取输入的信息
        $article_data = $request -> except('_token');
        //创建文件上传对象
        if($request->hasFile('apic') == true){
            $apic = $request -> file('apic');
            //获取文件后缀
            $ext = $apic -> getClientOriginalExtension();
            //随机生成文件名
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $aaa = $apic -> move($dir_name, $temp_name);
            $article_data['apic'] = $aaa; 
        }
        // dd($article_data);
        //实例化数据表
        $article = new Articles;
        $article -> title = $article_data['title'];
        if (!empty($article_data['apic'])) {
            $article -> apic = $article_data['apic'];
        }
        $article -> content = $article_data['content'];
        $article -> author = $article_data['author'];
        $res = $article -> save();
         if($res){
            return redirect('/admin/articles')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('errors','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //通过id查询信息
        $datas = Articles::find($id);
        //加载显示模板
        return view('Admin.Article.show',['title'=>'文章详情','datas'=>$datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Articles::find($id);
        //加载显示模板
        return view('Admin.Article.edit',['title'=>'文章修改','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
        //获取输入的信息
        $article_data = $request -> except('_token');
        //创建文件上传对象
        if($request->hasFile('apic') == true){
            $apic = $request -> file('apic');
            //获取文件后缀
            $ext = $apic -> getClientOriginalExtension();
            //随机生成文件名
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;;
            //执行上传
            $aaa = $apic -> move($dir_name, $temp_name);
            $article_data['apic'] = $aaa;
        }
        // dd($article_data);
        //实例化数据表
        $article = Articles::find($id);
        $article -> title = $article_data['title'];
        if (!empty($article_data['apic'])) {
            $article -> apic = $article_data['apic'];
        }
        $article -> content = $article_data['content'];
        $article -> author = $article_data['author'];
        $res = $article->save();
         if($res){
            return redirect('/admin/articles')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('errors','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Articles::find($id);
        $res = $data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}

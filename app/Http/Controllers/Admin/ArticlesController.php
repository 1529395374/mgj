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
     * 后台文章显示
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
     * 后台文章添加页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Article.create',['title'=>'文章添加']);
    }

    /**
     * 文章执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        //获取输入的信息
        $article_data = $request -> except('_token');
        //实例化数据表
        $article = new Articles;
        $article -> title = $article_data['title'];
        // if (!empty($article_data['apic'])) {
        //     $article -> apic = $article_data['apic'];
        // }
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
     * 后台文章显示详情
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
     * 后台文章显示页.
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
     * 后台文章执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
        //获取输入的信息
        $article_data = $request -> except('_token');
        //实例化数据表
        $article = Articles::find($id);
        $article -> title = $article_data['title'];
        // if (!empty($article_data['apic'])) {
        //     $article -> apic = $article_data['apic'];
        // }
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
     * 后台文章执行删除
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

    /**
     * [前台文章详情]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function detail(Request $request)
    {
        //查询文章表内容
        $id = $request -> input('id');
        $content_data = Articles::find($id);
        //加载模板
        return view('Home.Article.detail',['content_data'=>$content_data]);
    }
}

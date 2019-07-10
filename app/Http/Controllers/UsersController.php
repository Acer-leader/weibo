<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
class UsersController extends Controller
{
    //过滤位登录用户可操作update 登录 等 动作
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['show','create','store','index','confirmEmail']
        ]);
        $this->middleware('guest',[
           'only' => ['create']
        ]);
    }

    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }
    //注册页面
    public function create()
    {
        return view('users.create');
    }

    //个人用户一个人拥有多条微博展示
    public function show(User $user)
    {
        $statuses = $user->statuses()->orderBy('created_at','desc')->
            paginate(10);
        return view('users.show',compact('user','statuses'));
    }

    public function store(Request $request)
    {
        //用户提交后处理
        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        //保存用户数据
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //发送邮件激活并登录
        $this->sendEmailConfirmationTo($user);
        session()->flash('success','验证邮件已经发送到邮箱');
        return redirect('/');
//        Auth::login($user);
//        session()->flash('success','欢迎 你将开始一段新的旅程');
//        return redirect()->route('users.show',[$user]);

    }
    public function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
//        $from = 'y1wanghui@163.com'; 邮件发送已经配置
        //$name = '你大爷';  名字已经配置
        $to = $user->email;
        $subject = "感谢注册";
        Mail::send($view,$data,function ($message) use(/**$from,$name,*/$to,$subject) {
            $message->from($from,$name)->to($to)->subject($subject);
        });
    }
    //邮件激活操作
    public function confirmEmail($token)
    {
        $user = User::where('activation_token',$token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success','恭喜你激活成功');
        return redirect()->route('users.show',[$user]);
    }
    //用户修改展示页面
    public function edit(User $user)
    {
        //authorize 方法来验证用户授权策略。
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    //更新页面动作
    public function update(User $user,Request $request)
    {
        //authorize 方法来验证用户授权策略。
        $this->authorize('update',$user);
        //规则
        $this->validate($request,[
           'name'=>'required|max:50',
           'password'=> 'nullable|confirmed|min:6',
        ]);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password){
            $data['password'] = bcrypt($request->password);
        }
        //处理动作
       $user->update($data);
        session()->flash('success','个人资料更新成功');
        return redirect()->route('users.show',$user);
    }
    //删除操作
    public function destroy(User $user)
    {
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success','成功删除用户');
        return back();
    }
    //关注人的动作
    public function followings(User $user)
    {
        $users = $user->followings()->paginate(10);
        $title = $user->name .'关注的人';
        return view('users.show_follow',compact('users','title'));
    }
    // 粉丝列表
    public function followers(User $user)
    {
        $users = $user->followers()->paginate(10);
        $title = $user->name . '粉丝';
        return view('users.show_follow',compact('users','title'));
    }
}

<li class="media mt-4 mb-4">
    <a href="{{ route('users.show',$user->id) }}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar">
    </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $user->name }} <small> /{{ $status->created_at->diffForHumans() }}</small></h5>
        {{ $status->content }}
    </div>
{{--    删除按钮--}}
    <form action="{{ route('statuses.destroy',$status->id) }}" method="post" onsubmit="return confirm('你确定删除这条微博吗')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger">删除</button>
    </form>

</li>

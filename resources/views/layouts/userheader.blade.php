<div class="card card-profile">
    <div class="card-header" style="background-image: url(https://sz.ali.ftc.red/ftc/2018/08/03/pixabay-2847042.md.jpg);"></div>
    <div class="card-body text-center">
        <img class="card-profile-img" src="{{!empty($user->author) ? $user->author : Gravatar::get($user->email)}}">
        <h3 class="mb-3"><a href="{{route("userPage",['user_id'=>$user->id])}}">{{$user->name}}</a></h3>
        <p class="mb-4">
            {{$user->email}}
        </p>
        <button type="button" class="btn btn-danger" onclick="inDev()"><i class="fe fe-heart mr-2"></i>赞赏</button>
    </div>
</div>

<script>
    function inDev(){
        swal({
            type:'error',
            title:'开发中',
            text: '赞赏功能还未完成',
            heightAuto: false,
            timer: 2000
        })
    }

</script>

<style>
    a{
        text-decoration:none;
        color:#495057;
    }
    a:link{
        text-decoration:none;
    }
    a:visited{
        text-decoration:none;
    }
    a:hover{
        text-decoration:none;
    }
    a:active{
        text-decoration:none;
    }
</style>
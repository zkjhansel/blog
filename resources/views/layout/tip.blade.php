
<div class="result_wrap">
    <div class="result_title">
        @if(count($errors)>0)
            <div class="mark">
                {{--@foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach--}}
                <p style="color: red">{{ $errors->first() }}</p>
            </div>
        @elseif(session('errorMsg'))
            <div class="mark">
                <p style="color: red">{{ session('errorMsg') }}</p>
            </div>
        @elseif(session('successTip'))
            <div class="mark">
                <p style="color:green;">{{ session('successTip') }}</p>
            </div>
        @endif
    </div>
</div>
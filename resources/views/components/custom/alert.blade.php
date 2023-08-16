@foreach (['red', 'yellow', 'blue'] as $msg)
    @if(Session::has($msg))
        <div class="max-w-2xl mx-auto">
            <div class="bg-{{ $msg }}-500 text-slate-100 mt-10 px-3 rounded-lg text-center">
                <div class="mt-2 rounded-lg py-1">
                    <div class="ml-3.5">
                        <span class="text-xl">{!! Session::get($msg) !!}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

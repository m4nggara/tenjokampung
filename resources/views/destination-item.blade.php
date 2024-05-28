@foreach ($destination as $key => $item)	
    @php
        $isFirst = ($isFirst ?? null) != null ? $isFirst : false;
        $i = $key+1;
        $jmlkata = $i == 1 ? 800 : 300;
        $jmlstar = mt_rand(1, 5);
    @endphp
    <div class="@if($i==1 && $isFirst) col-12  @else col-md-6 @endif mb-2" style="@if($i==1) min-height: 400px !important; @endif">
        <div class="h-100 p-5 text-white @if(\App\Helpers\Helper::isPrima($i)) bg-dark @endif rounded-3" style="@if(!\App\Helpers\Helper::isPrima($i)) background:url('https://picsum.photos/200?random={{ $i }}&blur=2') no-repeat; background-size: cover; --bs-bg-opacity: .5; @endif">
        <h2 class="@if(!\App\Helpers\Helper::isPrima($i))  text-white @endif" style="@if(!\App\Helpers\Helper::isPrima($i)) text-shadow: 2px 1px 2px rgba(0, 0, 0, 1); @endif">{{ $item->name }}
            <div class="mt-1 mb-0 p-0">
                @for ($j = 1; $j <= $jmlstar; $j++)
                <i class="fas fa-star fs-base lh-base align-top text-warning"></i>
                @endfor
                @if($jmlstar < 5) 
                    @for ($j = 1; $j <= 5-$jmlstar; $j++)
                    <i class="ph-star fs-base lh-base align-top text-warning"></i>
                    @endfor
                @endif
            </div>
            <div class="text-white fs-base fw-normal pt-0 mt-0" style="@if(!\App\Helpers\Helper::isPrima($i)) text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.85); @endif">{{ $jmlstar }} viewers</div>
        </h2>
        <p class="@if(!\App\Helpers\Helper::isPrima($i))  text-white @endif" style="@if(!\App\Helpers\Helper::isPrima($i)) text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.85); @endif">{!! substr(strip_tags($item->desc), 0, $jmlkata) !!} ...</p>
        <form action="{{ route('detail', ['slug' => $item->slug]) }}" method="post">
            @csrf
            <button class="btn btn-outline-light text-white" type="submit" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">Lihat Detail</button>
        </form>
        </div>
    </div>
@endforeach
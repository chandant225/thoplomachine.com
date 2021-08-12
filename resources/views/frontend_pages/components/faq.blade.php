@if (count($faq) > 0)
    <section id="faq">
        <div class="faq ">
            <div class="faq-title">
                <h2 class="color">FAQs</h2>
            </div>
            <div class="faq-wrapper col-xl-7 col-md-8 col-sm-11 col-12 m-auto" id="faq-1">

                @foreach ($faq as $item)
                    <div class="faq-item" id="{{ $item->slug }}">
                        <div class="fi-title" onclick="showFaq('{{ $item->slug }}');">
                            <div class="fi-head">
                                <h4>
                                    {!! $item->title !!}
                                </h4>
                            </div>
                            <i class="fa fa-plus"></i>
                        </div>
                        <p class="fi-desc color">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif

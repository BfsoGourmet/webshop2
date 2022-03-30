@extends('welcome')
@section('categories')
<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Kategorien</h3>
        </header><!-- sect-heading -->

        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/1.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#&{{$category->id}}" class="title">{{$category->title}}</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>
@stop
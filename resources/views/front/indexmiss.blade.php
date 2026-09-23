@extends('front.layoutmiss')
@section('head')
<meta property="og:title" content="Miss Cameroun - People choice" />
<meta property="og:type" content="siteweb" />
<meta property="og:image" content="https://vote.misscameroun.org/images/logo1.png" />
<meta property="og:url" content="https://vote.misscameroun.org" />
<title>Miss cameroun - People'Choice</title>

<style>
    .titre12{
        font-size: 12px;
    text-align: center;
    font-weight: 700;
    line-height: normal;
    background: var(--main-bg-color);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 0 auto;
    }
</style>
@endsection
@section('main')

<div class="cover">
            
    <div class="bgimg" style="background: url('/images/cover{{random_int(1,3)}}.jpeg') lightgray -0.103px 0px / 106.154% 100% no-repeat; background-size: cover;
    background-position: center top;">
        <div class="bgimgover">
            <div class="wrapper">

                <div class="inside-container">
                    <div class="dots">
                        <img src="{{asset('misscam/images/dots.svg')}}" class="d1" alt="" />
                        <img src="{{asset('misscam/images/dots (1).svg')}}" class="d2" alt="" />
                    </div>
                    <div class="text-part">
                        <h2>Miss Cameroun 2026</h2>
                        <h3>Vote for favorite contestant / Votez pour votre candidate preférée</h3>
                        <a href="#c-section" class="btn btvoterf btnN"><span>Vote now</span></a>
                    </div>
                    

                </div>
            
            </div>
        </div>
    </div>
    
    
   
</div>

@include('front.partials.candidatesmiss')






@endsection

@section('footer')



@endsection

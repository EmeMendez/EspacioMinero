@extends('layout')
@section('content')

    <div class="container">

        <div class="row mx-2 my-5">

            <a class="ml-1 perso" href="{{route('proveedor.create')}}">
                <div class="col-6 ml-5 cont">
                    <div>
                        
                            <img src="/images/provider.png">
                        
                    </div>
                    <div>
                        <h4>Soy empresa(proveedor)</h4>
                    </div>
            
                </div>
            </a>

            <a class="" href="{{route('guest.create')}}">
                <div class="col-6 ml-5 cont ">
                    <div>
                        
                            <img src="/images/users.png">
                        
                    </div>
                    <div>
                        <h4>Soy persona natural</h4>
                    </div>
                    
                </div>
            </a>
        
        
        
        </div>
    </div>

<style>

    .perso{
        width: 40%;
        
    }

    .cont{
        border-radius: 15px;
        justify-content: center;
    }

    img{
        width: 100%;
        height: 100%;
    }

    *{
        box-sizing: inherit;
    }
</style>

@endsection
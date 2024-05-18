<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="" class="link">Admin</a></li>
                    <li class="item-link"><span>Manage home slider</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.Addhomeslider')}}"type="button" class="btn btn-success">Add Slider</a>
            </div>

        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif
        <div class="row">

                <div class="col-md-12">

                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>Id</th>
                                <th>Image</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">SubTitle</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Date</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td style="padding:8px;" class="price" data-title="slider Id"><span>{{$slider->id}}</span></td>
                                        <td style="padding:8px;" class="image" data-title="image"><span><img src="{{asset('images/Sliders')}}/{{$slider->image}}"/></span></td>
                                        <td style="padding:8px;" class="title" data-title="slider Id"><span>{{$slider->title}}</span></td>
                                        <td style="padding:8px;" class="SubTitle" data-title="SubTitle"><span>{{$slider->subtitle}}</span></td>
                                        <td style="padding:8px;" class="Price" data-title="Price"><span>{{$slider->price}}</span></td>
                                        <td style="padding:8px;" class="Link" data-title="Link"><span>{{$slider->link}}</span></td>
                                        <td style="padding:8px;" class="Status" data-title="Status"><span>{{$slider->status == 1 ? 'Active':'Inactive'}}</span></td>
                                        <td style="padding:8px;" class="Date" data-title="Date"><span>{{$slider->created_at}}</span></td>
                                        <td style="padding:8px; display:flex;" class="action" data-title="action">
                                            <a href="{{route('Admin.Edithomeslider',['slide_id'=>$slider->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this product ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{$slider->id}})"><i class="ti-trash remove-icon"></i></a>
                                        </td>
                                    </tr>


                                    @endforeach


                        </tbody>
                    </table>

                </div>


            <div id="link">
                {{$sliders->links()}}
            </div>

        </div>

    </div>
</div>


{{-- <script>
 const drop=document.getElementsByClassName("customdrop");
 function dropnone(){
    for(i=0;i<drop.length;i++){
    drop[i].style.display="none";
 }
 }
 dropnone();
 function costumdrop(i){
     console.log(i);
    if(drop[i].style.display=="block"){
        dropnone();
    }else{
        dropnone();
        drop[i].style.display="block";
    }
 }
</script> --}}

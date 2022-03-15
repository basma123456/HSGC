<!-- start footer -->
<footer>
    <div class="container p-5 ">
        <div class="row pt-5 position-relative ">
            <div class="col-lg-6 col-md-12 ">
                <h1 class=" text-white ">HSGC</h1>
                <p>{{\App\Http\Models\Footer::value('summary')}}</p>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <h3 class=" text-white ">Contact Us</h3>
                <p>(+20) {{\App\Http\Models\Footer::value('company_phone')}} </p>
                <p>{{\App\Http\Models\Footer::value('company_email')}}</p>
                <p>{{\App\Http\Models\Footer::value('company_address')}}</p>

            </div>



            <div class="col-lg-3 col-md-6 ">
                <h3 class="text-center text-white ">Social Media</h3>
                <div class="icons d-flex justify-content-around ">
                    <a target="blank " href="{{\App\Http\Models\Footer::value('facebook_link')}}">
                        <div class="icon "><i class="fa-brands fa-facebook "></i></div>
                    </a>
                    <a target="blank " href="{{\App\Http\Models\Footer::value('instagram_link')}}">
                        <div class="icon "><i class="fa-brands fa-instagram "></i></div>
                    </a>
                    <a target="blank " href="{{\App\Http\Models\Footer::value('twitter_link')}}">
                        <div class="icon "><i class="fa-brands fa-twitter "></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->

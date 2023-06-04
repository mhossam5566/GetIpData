@extends('app')

@section('content')

<div class="page-loader" id="loader-page">
  <div class="loadingio-spinner-spinner-al1hhzahom">
    <div class="ldio-vwwqwlfvha">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>

<center>
  <h2>Get Ip Information</h2>
  <form class="srch" id="search" method="post" action="{{Route('get_data')}}">
    @csrf
    <input class="srch_input" placeholder="Enter IP Here" name="ip"></input>
    <button id="lookupBtn" class="search" onclick="showLoader()">LookUp</button>



  </form>

  @if(isset($data))
  <div class="data">
    <div class="location">
      <br>
      <h3>Location For {{$data->ip}}</h3>
      <div id="map"></div>
    </div>
    <!--location-->

    <div class="values">

      <h3>More Information</h3>
      <img src="{{$data->flag}}" width="80px"></img>

      <div class="info">
        <p>
          Country
        </p>
        <p>
          {{$data->country_name}}
        </p>
      </div>

      <div class="info">
        <p>
          Region
        </p>
        <p>
          {{$data->region}}
        </p>
      </div>

      <div class="info">
        <p>
          City
        </p>
        <p>
          {{$data->city}}
        </p>
      </div>

      <div class="info">
        <p>
          IPS
        </p>
        <p>
          {{$data->asn->name}}
        </p>
      </div>

      <div class="info">
        <p>
          Language
        </p>
        <p>
          {{$data->languages[0]->native}}
        </p>
      </div>

      <div class="info">
        <p>
          currency
        </p>
        <p>
          {{$data->currency->name}}
        </p>
      </div>

      <div class="info">
        <p>
          Time Zone
        </p>
        <p>
          {{$data->time_zone->name}}
        </p>
      </div>

      <div class="info">
        <p>
          Current Time
        </p>
        <p>
          {{$data->time_zone->current_time}}
        </p>
      </div>
    </div>

  </div>
  <!--data-->
  @endif



  <!--###############Info##########-->

  <div class="about">
    <div class="about_section">
      <i class="fa-solid fa-location-dot"></i>
      <h3>IP Geolocation</h3>
      <p>
        Accurately determine the physical location of any IP address.
      </p>
    </div>

    <div class="about_section">
      <i class="fas fa-globe"></i>

      <h3>IP-based Data Retrieval</h3>
      <p>
        Retrieve relevant data by leveraging the IP address of your users.
      </p>
    </div>

    <div class="about_section">
      <i class="fas fa-chart-line"></i>

      <h3>IP Tracking and Analysis</h3>
      <p>
        Gain insights into user behavior and demographics through IP address tracking and analysis.
      </p>
    </div>

  </div>
  <!--about-->

  <!--#########F O O T E R ########-->
  <br><br>
  <footer>
    <div class="footer-content">
      <div class="social-links">
        <a href="#" class="social-link">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fa-brands fa-telegram"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fa-brands fa-linkedin"></i>
        </a>
        <a href="#" class="social-link">
          <i class="fa-brands fa-square-reddit"></i>
        </a>
      </div>
      <form class="newsletter-form" action="#" method="post">
        <input type="email" name="email" placeholder="Subscribe By Email" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
    <p class="rights">
      All rights Reversed &copy; 2023
    </p>
  </footer>

</center>

@endsection
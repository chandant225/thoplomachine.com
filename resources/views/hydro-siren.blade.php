@extends('frontend.layouts.app')


@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Hydro siren system</li>
      </ol>
      <h2>{{ get_setting('about_title') }}</h2>

    </div>
  </section><!-- End Breadcrumbs -->
<div class="container">

    <div class="py-8">
        <div class="row">
            <div class="col-lg-6">
                <img style="height: 25rem" src="/product_images/hydro-siren.jpg" class="card-img-top" alt="hydro-siren.jpg">
            </div>
            <div class="col-lg-6">
                <img style="height: 25rem" src="/front.jpeg" class="card-img-top" alt="hydro-siren.jpg">
            </div>
        </div>
      
    </div>
      <h4 class="mt-2">Hydro siren system</h4>
     <p>Siren or alerting system is one of the essential features for hydropower in order to alert nearby people and/or settlement. When the gates of the dam opened, the river level would suddenly rise and represent very sudden danger. It is necessary to warn people at the time of dam opening. For that every dam needs a foolproof warning system to alert downstream habitats before release of water from the dam spillways.</p>

     <p>Warning and or alert system comparison more than 2 sirens which need to be installed several kilometers away from the dam's vulnerable points where people are fishing, collecting water, washing clothes or where there are settlements/villages close to the river bank which would be exposed to the risk of water surge.</p>

     <h4>Thoplo Hydro siren</h4>
     <p>Thoplo machine are known for customized, reliable and quality product. Hydro siren-series 102 is customized and designed for small and medium hydropower dams. When an authorized person presses the emergency switch, all the sirens located several km away from the dam sound for predefined time. Users can add any number of sirens depending upon requirement. Users can also adjust siren time.</p>

    <h4>Technical Specification:</h4>
    <ul>
        <li>
            Communication medium : Optical fiber 
        </li>
        <li>
            Communication range > 25Km
        </li>
        <li>
            Communication protocol : User Datagram Protocol (UDP)
        </li>
        <li>
            Siren: Motorized AC/DC Siren 
        </li>
        <li>
            Siren Time: 10 Sec., 15 Sec, 20 Sec. and manual
        </li>
        <li>
            Power Supply: 12V DC
        </li>
       <li>
        Power Consumption 
            <br/>Control system > 5 Watt
            <br/>Siren system > 5 Watt
       </li>
    </ul>   
    
    <h4>Product benefits:</h4>
    <ul>
        <li>
            
The latest microcontroller based design
        </li>
        <li>
            Low energy consumption
        </li>
        <li>
            
Optical fiber communication
        </li>
        <li>
            Modular design and Maximum reliability
        </li>
        <li>
            Custom sirten time setting and specific alarm
        </li>
        <li>
            
Motorized AC/DC Siren
        </li>
        <li>
            
Automatic and manual mode
        </li>
        <li>
            Long range communication
        </li>
        <li>
            Cost effective and low maintenance
        </li>
    </ul>
    
   
    
    
 

	
	








</div>
@endsection
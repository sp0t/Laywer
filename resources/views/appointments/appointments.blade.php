@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
   
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
       

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">  <a href="/appointments" class="breadcrumb-item">Appointments</a> </span>
                </div>
    
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
    
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    
    
                    <div class="breadcrumb-elements-item dropdown p-0">
                        
    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="content">

    <!-- Basic tabs title -->
    
    <!-- /basic tabs title -->


    <!-- Basic tabs -->
    
        
            <div class="card">
                <div class="card-header">
                   
			<div class="d-flex justify-content-end align-items-center">
				<a href="/addnewappointments"> 								
				<button type="submit" class="btn btn-primary " style="margin-right: 50px;">Add Appoiment</button></a> 
			
				
			</div> 
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#basic-tab1" class="nav-link active" data-toggle="tab">Appointments</a></li>
                        <li class="nav-item"><a href="#basic-tab2" class="nav-link" data-toggle="tab">Requests</a></li>
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="basic-tab1">
                           
				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					
					<!-- /dashboard content -->
<!-- Content area -->
<div class="content">

	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Appoimnets</h5>
		</div>
		
		<div class="card-body">

			<br>
			<div class="fullcalendar-agenda fc fc-media-screen fc-direction-ltr fc-theme-standard"><div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr"><div class="fc-toolbar-chunk"><div class="fc-button-group"><button class="fc-prev-button fc-button fc-button-primary" type="button" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button><button class="fc-next-button fc-button fc-button-primary" type="button" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button></div><button class="fc-today-button fc-button fc-button-primary" type="button">today</button></div><div class="fc-toolbar-chunk"><h2 class="fc-toolbar-title">Sep 6 – 12, 2020</h2></div><div class="fc-toolbar-chunk"><div class="fc-button-group"><button class="fc-timeGridWeek-button fc-button fc-button-primary fc-button-active" type="button">week</button><button class="fc-timeGridDay-button fc-button fc-button-primary" type="button">day</button></div></div></div><div class="fc-view-harness fc-view-harness-active" style="height: 724.444px;"><div class="fc-timegrid fc-timeGridWeek-view fc-view"><table class="fc-scrollgrid  fc-scrollgrid-liquid"><thead><tr class="fc-scrollgrid-section fc-scrollgrid-section-header "><td><div class="fc-scroller-harness"><div class="fc-scroller" style="overflow: hidden scroll;"><table class="fc-col-header " style="width: 970px;"><colgroup><col style="width: 59px;"></colgroup><tbody><tr><th class="fc-timegrid-axis"><div class="fc-timegrid-axis-frame"></div></th><th class="fc-col-header-cell fc-day fc-day-sun fc-day-past" data-date="2020-09-06"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-06&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Sun 9/6</a></div></th><th class="fc-col-header-cell fc-day fc-day-mon fc-day-past" data-date="2020-09-07"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-07&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Mon 9/7</a></div></th><th class="fc-col-header-cell fc-day fc-day-tue fc-day-past" data-date="2020-09-08"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-08&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Tue 9/8</a></div></th><th class="fc-col-header-cell fc-day fc-day-wed fc-day-past" data-date="2020-09-09"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-09&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Wed 9/9</a></div></th><th class="fc-col-header-cell fc-day fc-day-thu fc-day-past" data-date="2020-09-10"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-10&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Thu 9/10</a></div></th><th class="fc-col-header-cell fc-day fc-day-fri fc-day-past" data-date="2020-09-11"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-11&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Fri 9/11</a></div></th><th class="fc-col-header-cell fc-day fc-day-sat fc-day-past" data-date="2020-09-12"><div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion " data-navlink="{&quot;date&quot;:&quot;2020-09-12&quot;,&quot;type&quot;:&quot;day&quot;}" tabindex="0">Sat 9/12</a></div></th></tr></tbody></table></div></div></td></tr></thead><tbody><tr class="fc-scrollgrid-section fc-scrollgrid-section-body "><td><div class="fc-scroller-harness"><div class="fc-scroller" style="overflow: hidden scroll;"><div class="fc-daygrid-body fc-daygrid-body-unbalanced fc-daygrid-body-natural" style="width: 970px;"><table class="fc-scrollgrid-sync-table" style="width: 970px;"><colgroup><col style="width: 59px;"></colgroup><tbody><tr><td class="fc-timegrid-axis fc-scrollgrid-shrink"><div class="fc-timegrid-axis-frame fc-scrollgrid-shrink-frame fc-timegrid-axis-frame-liquid"><span class="fc-timegrid-axis-cushion fc-scrollgrid-shrink-cushion fc-scrollgrid-sync-inner">all-day</span></div></td><td class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2020-09-06"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2020-09-07"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -260.281px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">Long Event</div></div></div></div><div class="fc-event-resizer fc-event-resizer-end"></div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 33px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2020-09-08"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 33px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2020-09-09"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 33px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2020-09-10"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2020-09-11"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -130.656px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">Conference</div></div></div></div><div class="fc-event-resizer fc-event-resizer-end"></div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 33px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2020-09-12"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 33px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr></tbody></table></div></div></div></td></tr><tr class="fc-scrollgrid-section"><td class="fc-timegrid-divider fc-cell-shaded"></td></tr><tr class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid"><td><div class="fc-scroller-harness fc-scroller-harness-liquid"><div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden scroll;"><div class="fc-timegrid-body" style="width: 970px;"><div class="fc-timegrid-slots"><table class="" style="width: 970px;"><colgroup><col style="width: 59px;"></colgroup><tbody><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="00:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">12am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="00:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="00:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="00:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="01:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">1am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="01:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="01:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="01:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="02:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">2am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="02:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="02:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="02:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="03:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">3am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="03:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="03:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="03:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="04:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">4am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="04:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="04:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="04:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="05:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">5am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="05:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="05:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="05:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="06:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">6am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="06:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="06:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="06:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="07:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">7am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="07:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="07:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="07:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="08:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">8am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="08:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="08:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="08:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="09:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">9am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="09:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="09:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="09:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="10:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">10am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="10:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="10:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="10:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="11:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">11am</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="11:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="11:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="11:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="12:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">12pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="12:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="12:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="12:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="13:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">1pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="13:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="13:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="13:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="14:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">2pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="14:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="14:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="14:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="15:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">3pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="15:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="15:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="15:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="16:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">4pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="16:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="16:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="16:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="17:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">5pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="17:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="17:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="17:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="18:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">6pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="18:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="18:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="18:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="19:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">7pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="19:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="19:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="19:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="20:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">8pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="20:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="20:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="20:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="21:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">9pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="21:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="21:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="21:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="22:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">10pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="22:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="22:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="22:30:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="23:00:00"><div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"><div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">11pm</div></div></td><td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="23:00:00"></td></tr><tr><td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="23:30:00"></td><td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="23:30:00"></td></tr></tbody></table></div><div class="fc-timegrid-cols"><table style="width: 970px;"><colgroup><col style="width: 59px;"></colgroup><tbody><tr><td class="fc-timegrid-col fc-timegrid-axis"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-sun fc-day-past" data-date="2020-09-06"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-mon fc-day-past" data-date="2020-09-07"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-tue fc-day-past" data-date="2020-09-08"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-wed fc-day-past" data-date="2020-09-09"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 960px 0% -1020px; z-index: 1;"></div></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-thu fc-day-past" data-date="2020-09-10"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-fri fc-day-past" data-date="2020-09-11"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td><td class="fc-timegrid-col fc-day fc-day-sat fc-day-past" data-date="2020-09-12"><div class="fc-timegrid-col-frame"><div class="fc-timegrid-col-bg"></div><div class="fc-timegrid-col-events"><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 630px 0% -750px; z-index: 1;"></div><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 720px 0% -780px 50%; z-index: 2;"></div><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 870px 0% -930px; z-index: 1;"></div><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 1050px 0% -1110px; z-index: 1;"><a class="fc-timegrid-event fc-v-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-time">Crete by:wasana</div><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">Discussion 001</div></div></div></div><div class="fc-event-resizer fc-event-resizer-end"></div></a></div><div class="fc-timegrid-event-harness fc-timegrid-event-harness-inset" style="inset: 1200px 0% -1260px; z-index: 1;"></div></div><div class="fc-timegrid-col-events"></div><div class="fc-timegrid-now-indicator-container"></div></div></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
		</div>
	</div>

</div>
<!-- /content area -->
				</div>
				<!-- /content area -->
                        </div>

                        <div class="tab-pane fade" id="basic-tab2">
                      
                            <div class="content">
                                <div class="content">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="content">

                                                <!-- Main charts -->
                                               
                                                <!-- /main charts -->
                                                
                                                <!-- Dashboard content -->
                                                  
                                                <!-- /dashboard content -->
                                            <!-- Content area -->
                                            
                                            <!-- Basic responsive configuration -->
                                            
                                               
                                                    <div class="row-fluid">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Appoimnet Requests</h5>
                                                    </div>
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Time</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Requested By</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Purpose</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Location</th>
                                                
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                    <tr class="odd">
                                                            <td class="dtr-control sorting_1" tabindex="0">08/18/2022</td>
                                                            <td>13.00pm</td>
                                                            <td>john viiam</td>
                                                            
                                                            <td>fix meeting james and harun</td>
                                                            <td>KMC</td>
                                                            <td>
                                                            <div class="list-icons">
                                                                <i class="fas fa-trash-alt" title="Write">
                                                                <a href="/editappointmentrequests" class="list-icons-item text-primary"><i class="icon-pencil"></i> </a></i>
                                                                <i class="fas fa-trash-alt" title="Reject">
                                                                <a href="/editappointmentrequests" class="list-icons-item text-danger"><i class="icon-cross"></i></a></i>
                                                                
                                                                
                                                            </div></td>
                                                            
                                                        </tr>
                                                        </tbody>
                                                </table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
                                                </div>
                                            <!-- /content area -->
                                            </div>




                                        </div></div>
                                    

                                </div>

                            </div>
                        
                        </div>
                </div>
            </div>
       

        
   
    <!-- /basic tabs -->


    <!-- Rounded basic tabs -->
    
    <!-- /rounded basic tabs -->


    <!-- Highlighted tabs -->
    
    <!-- /highlighted tabs -->



    <!-- Tabs with top line -->
    

    
    <!-- /tabs with top line -->
 

</div>


@endsection

@section('footer')
<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        

        <ul class="navbar-nav ml-lg-auto">
            
            <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-black"><i class="icon-circle mr-2"></i>by syncbridge</span></a></li>
        </ul>
    </div>
</div>
@endsection

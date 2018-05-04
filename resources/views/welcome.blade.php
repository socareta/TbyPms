<!doctype html>
<html lang="@{{ app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Tobeasy travel PMS</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <style type="text/css">.hidden{display: none;}</style>
        <style type="text/css">
          table.tableCalender{
            border-collapse: collapse !important;
          }

          .tableCalender th{
            border:1px solid black !important;
            font-size: 12px !important;
            font-weight: 800 !important;
            text-align: center !important;
            border-spacing: 0px !important;
            padding: 1px !important;
          }  
          .tableCalender td{
            border:1px solid black !important;
            font-size: 12px !important;
            padding: 1px !important;
          }
          ul .dropdown-content{
            top:63px !important;
          }
          div .collapsible-body ul{
            background-color: rgba(0,0,0,0.05);
          }
          table tr:hover{
            cursor: pointer;
            background-color: #e0f7fa;
          }
        </style>
    </head>
    <body>
<div id="pms-trv">
        <nav>
            <div class="nav-wrapper">
              <a  class="brand-logo right">TobeasyTravel</a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger "><i class="material-icons">menu</i></a>
              <ul class="left hide-on-med-and-down">
                <li
                v-bind:class="[{ active: curentMenu === 'dashboard' }]"
                v-on:click="curentMenu='dashboard'"
                ><a ><i class="material-icons left">dashboard</i> Dashboard</a></li>
                <li><a class="dropdown-trigger" data-target="dd-fd" href="JavaScript:"><i class="material-icons left">room_service</i> FrontDesk<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dd-master"  data-target="dd-master"><i class="material-icons left">settings</i> Master<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="mobile.html"><i class="material-icons left">insert_chart</i> Report</a></li>
              </ul>
              <ul id="dd-master" class="dropdown-content">
                    <li 
                    v-bind:class="[{ active: curentMenu === 'property' }]"
                    v-on:click="curentMenu='property';getData('property')">
                    <a>    <i class="material-icons">account_balance</i>
                        Property</a>
                    </li>
                   <li class="divider"></li>
                  <li  v-bind:class="[{ active: curentMenu === 'room' }]"
                  v-on:click="curentMenu='room';getData('room')"><a  ><i class="material-icons">hotel</i> Room</a></li>
                  <li class="divider"></li>
                  <li v-bind:class="[{ active: curentMenu === 'sob' }]"
                  v-on:click="curentMenu='sob';getData('sob')"><a ><i class="material-icons">public</i> SOB</a></li>
                </ul>
                <ul id="dd-fd" class="dropdown-content">
                  <li 
                  v-bind:class="[{ active: curentMenu === 'reservation' }]"
                  v-on:click="curentMenu='reservation';getData('reservation')"><a ><i class="material-icons">airline_seat_individual_suite</i> Reservation</a></li> <li class="divider"></li>@php $co= date_create(now());date_add($co,date_interval_create_from_date_string('30 days')); $nco=date_format($co,"Y-m-d");  @endphp
                  <li 
                  v-bind:class="[{ active: curentMenu === 'calendar-booking' }]"
                  v-on:click="curentMenu='calendar-booking';getData('calender/{{date('Y-m-d')}}/{{$nco}}')"><a ><i class="material-icons">view_comfy</i> Calendar Booking</a></li> <li class="divider"></li>
                  <li
                   v-bind:class="[{ active: curentMenu === 'payment' }]"
                   v-on:click="curentMenu='payment';getData('payment')"><a ><i class="material-icons">payment</i> Payment</a></li> <li class="divider"></li>
                  <li v-bind:class="[{ active: curentMenu === 'folio' }]"
                  v-on:click="curentMenu='folio';getData('folio')"><a ><i class="material-icons">attach_money</i> Folio</a></li>
                </ul>
            </div>
          </nav>

          <ul class="sidenav" id="mobile-demo">
            <li><a href="sass.html"><i class="material-icons left">dashboard</i> Dashboard</a></li>
            <li class="no-padding">
              <ul id="collapsibleRes" class="collapsible collapsible-accordion">
                <li>
                  <a class="collapsible-header" >  <i class="material-icons left" style="margin-left: 16px;">room_service</i> FrontDesk<i class="material-icons right">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li 
                        v-bind:class="[{ active: curentMenu === 'reservation' }]"
                        v-on:click="curentMenu='reservation';getData('reservation')"><a > <i class="material-icons" style="margin-left: 16px;">airline_seat_individual_suite</i> Reservation</a></li> <li class="divider"></li>
                        <li 
                        v-bind:class="[{ active: curentMenu === 'calendar-booking' }]"
                        v-on:click="curentMenu='calendar-booking';getData('calender/{{date('Y-m-d')}}/{{$nco}}')"><a ><i class="material-icons" style="margin-left: 16px;">view_comfy</i> Calendar Booking</a></li> <li class="divider"></li>
                        <li
                         v-bind:class="[{ active: curentMenu === 'payment' }]"
                         v-on:click="curentMenu='payment';getData('payment')"><a ><i class="material-icons" style="margin-left: 16px;">payment</i> Payment</a></li> <li class="divider"></li>
                        <li v-bind:class="[{ active: curentMenu === 'folio' }]"
                        v-on:click="curentMenu='folio';getData('folio')"><a ><i class="material-icons" style="margin-left: 16px;">attach_money</i> Folio</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul id="collapsibleMaster" class="collapsible collapsible-accordion">
                <li>
                  <a class="collapsible-header" >  <i class="material-icons left" style="margin-left: 16px;">settings</i> Master<i class="material-icons right">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li 
                        v-bind:class="[{ active: curentMenu === 'property' }]"
                        v-on:click="curentMenu='property';getData('property')">
                        <a>    <i class="material-icons">account_balance</i>
                            Property</a>
                        </li>
                       <li class="divider"></li>
                      <li  v-bind:class="[{ active: curentMenu === 'room' }]"
                      v-on:click="curentMenu='room';getData('room')"><a  ><i class="material-icons">hotel</i> Room</a></li>
                      <li class="divider"></li>
                      <li v-bind:class="[{ active: curentMenu === 'sob' }]"
                      v-on:click="curentMenu='sob';getData('sob')"><a ><i class="material-icons">public</i> SOB</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </li>
            <li><a href="mobile.html"><i class="material-icons left">insert_chart</i> Report</a></li>
          </ul>
        <div class="content container">
            
            <component v-bind:is="currentMenuConponent" v-bind:headers="headers" v-bind:tdatas="datas" ></component>
            
            <form-reservation :tdatas="data" :rooms="rooms" :sobs="sobs" :type="typeRes"></form-reservation>
            <form-payment :tdatas="data" :type="typeRes" :properties="properties" :reservations="reservations"></form-payment>


            <form-property :tdatas="data" :type="typeRes"></form-property>
            <form-room v-bind:tdatas="data" :type="typeRes" :properties="properties"></form-room>
            <form-sob :tdatas="data" :type="typeRes"></form-sob>
             <!-- Dropdown Trigger -->
  
        </div>
</div>
<template  id="resForm-template">
    <div id="modalRes" class="modal modal-fixed-footer" style="min-height: 85%; min-width: 80%">
         
        <form v-on:submit.prevent="sendForm(tdatas[0],type)" action="#" method="post">
                <div class="modal-content">
                  <span style="font-size: 190%; font-weight: 600">Form Reservation</span>
                  <div class="row">
                      <div class="input-field col s12 m6 l6">
                          <input type="text" id="guest_name" v-model="tdatas[3]">
                          <label for="guest_name" v-bind:class="{active: tdatas.length>0}">Guest Name</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                          <input type="text" id="country" v-model="tdatas[4]">
                          <label for="country" v-bind:class="{active: tdatas.length>0}">Country</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                          <input type="text" id="email" v-model="tdatas[5]">
                          <label for="email" v-bind:class="{active: tdatas.length>0}">Guest Email</label>
                      </div>
                       
                       <div class="input-field col s12 m6 l6">
                          <input type="text" id="status_res" v-model="tdatas[6]" class="dropdown-trigger" data-target="ddStatusRes">
                          <label for="status_res" v-bind:class="{active: tdatas.length>0}">Status</label>
                          <ul class="dropdown-content" id="ddStatusRes">
                            <li @click="newStatus('confirmed')"><a>confirmed</a></li>
                            <li @click="newStatus('registered')"><a>registered</a></li>
                            <li @click="newStatus('canceled')"><a>canceled</a></li>

                          </ul>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="date" name="check_in" id="check_in" v-model="tdatas[7]">
                          <label for="check_in" v-bind:class="{active: tdatas.length>0}">Check In</label>
                      </div>
                       <div class="input-field col s10 m4 l4">
                          <input type="date" name="check_out" id="check_out" v-model="tdatas[8]">
                          <label for="check_out" v-bind:class="{active: tdatas.length>0}">Check Out</label>
                      </div>
                      <div class="input-field col s2 m4 l4">
                          <input type="number" name="los" id="los" v-model.number="tdatas[9]">
                          <label for="los" v-bind:class="{active: tdatas.length>0}"></label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="number" name="rate_usd" id="rate_usd" v-model.number="tdatas[10]">
                          <label for="rate_usd" v-bind:class="{active: tdatas.length>0}">rate_usd</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="number" name="rate_idr" id="rate_idr" v-model.number="tdatas[11]">
                          <label for="rate_idr" v-bind:class="{active: tdatas.length>0}">rate_idr</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="number" name="rate_contract" id="rate_contract" v-model.number="tdatas[12]">
                          <label for="rate_contract" v-bind:class="{active: tdatas.length>0}">rate_contract</label>
                      </div>


                       <div class="input-field col s12 m6 l6">
                          <input type="text" name="room_name_res" id="room_name_res" v-model="tdatas[16]" class="dropdown-trigger" data-target="ddRoomNameRes">
                          <label for="room_name_res" v-bind:class="{active: tdatas.length>0}">room_name</label>
                          <ul id='ddRoomNameRes' class='dropdown-content'>
                            <li v-for="room in rooms" @click="newRoom(room.id,room.room_name)"><a>@{{room.room_name}}-@{{room.property_name}}</a></li>
                          </ul>
                      </div>
                       <div class="input-field col s12 m6 l6">
                          <input type="text" name="sob_name_res" id="sob_name_res" v-model="tdatas[17]" class="dropdown-trigger" data-target="ddSobName">
                          <label for="sob_name_res" v-bind:class="{active: tdatas.length>0}">"sob_name</label>
                          <ul class="dropdown-content" id="ddSobName">
                            <li v-for="sob in sobs" @click="newSob(sob.id,sob.sob_name)"><a>@{{sob.sob_name}}</a></li>
                          </ul>
                      </div>
                      <div class="input-field col s12 m12 l12">
                          <textarea class="materialize-textarea" name="remark" id="remark" v-model="tdatas[13]"></textarea>
                          <label for="remark" v-bind:class="{active: tdatas.length>0}">Remark</label>
                      </div>
 
                    </div>
                  
                </div>
                <div class="modal-footer">

                  <a  class="modal-action modal-close waves-effect waves-green btn grey" >Close</a>
                  <a class="btn red" @click="destroy(tdatas[0])">Delete</a>
                    <button class="btn cyan" type="submit">
                        SUbmit
                        
                    </button> 
                </div>
            </form>
            </div>
</template>

<template id="paymentForm-template">
  <div id="modalPayment" class="modal modal-fixed-footer" style="min-height: 70%;">
              <form v-on:Submit.prevent="sendForm(tdatas[0],type)" action="#" method="post">
                <div class="modal-content">
                  <h4>Form Payment</h4>
                  
                    <div class="row">
                      <div class="input-field col s12 m6 l6"><input type="text" v-model="tdatas[1]" class="hidden">
                          <input type="text" id="guest_name_payment"  v-model="tdatas[12]" class="dropdown-trigger" data-target="ddResPayment">
                          <label for="guest_name_payment" v-bind:class="{active:tdatas.length>0}">Guest Name</label>
                          <ul id="ddResPayment" class="dropdown-content">
                            <li v-for="res in reservations" @click="newRes(res.id,res.guest_name,res.rate_contract)"><a>@{{res.guest_name}}</a></li>
                          </ul>
                      </div>
                       <div class="input-field col s12 m6 l6"><input type="hidden" v-model="tdatas[2]">
                          <input type="text" id="property_name_payment" v-model="tdatas[13]" class="dropdown-trigger" data-target="ddPropertyPayment">
                          <label for="property_name_payment" v-bind:class="{active:tdatas.length>0}">Villa Name</label>
                          <ul id="ddPropertyPayment" class="dropdown-content">
                            <li v-for="property in properties" @click="newProperty(property.id,property.property_name,property.bank_name)"><a>@{{property.property_name}}</a></li>
                          </ul>
                      </div>

                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="payment_type" v-model="tdatas[3]" class="dropdown-trigger" data-target="ddPaymentType">
                          <label for="payment_type" v-bind:class="{active:tdatas.length>0}">Payment Type</label>
                          <ul id="ddPaymentType" class="dropdown-content">
                            <li @click="newPaymentType('deposit')"><a>Deposit</a></li>
                            <li @click="newPaymentType('balance')"><a>Balance</a></li>
                            <li @click="newPaymentType('full payment')"><a>Full Payment</a></li>
                          </ul>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="text" id="payment_method" v-model="tdatas[4]" class="dropdown-trigger" data-target="ddPaymentMethod">
                          <label for="payment_method" v-bind:class="{active:tdatas.length>0}">Payment Method</label>
                          <ul id="ddPaymentMethod" class="dropdown-content">
                            <li @click="newPaymentMethod('Credit Card')"><a>Credit Card</a></li>
                            <li @click="newPaymentMethod('Bank Transfer')"><a>Bank Transfer</a></li>
                          </ul>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="text" id="bank_name_payment" v-model="tdatas[5]">
                          <label for="bank_name_payment" v-bind:class="{active:tdatas.length>0}">bank_name</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="number" id="amount" v-model.number="tdatas[6]">
                          <label for="amount" v-bind:class="{active:tdatas.length>0}">amount</label>
                      </div>

                       <div class="input-field col s12 m4 l4">
                          <input type="number" id="balance" v-model.number="tdatas[7]" @click="newBalance">
                          <label for="balance" v-bind:class="{active:tdatas.length>0}">balance</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="date" id="cod_balance" v-model="tdatas[8]">
                          <label for="cod_balance" v-bind:class="{active:tdatas.length>0}">cod_balance</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                          <textarea class="materialize-textarea" id="remark" v-model="tdatas[9]"></textarea>
                          <label for="remark" v-bind:class="{active:tdatas.length>0}">remark</label>
                      </div>
 
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <a  class="modal-action modal-close waves-effect waves-green btn grey">Close</a>
                  <a @click="destroy(tdatas[0])" class="btn red">Delete</a>
                  <button type="submit" class="btn cyan">SUbmit</button>
                </div></form>
            </div>   
</template>

<template id="propertyForm-template">
  <div id="modalProperty" class="modal modal-fixed-footer" style="min-height: 85%; min-width: 80%">
         
        <form v-on:submit.prevent="sendForm(tdatas[0],type)" action="#" method="post">
                <div class="modal-content">
                  <span style="font-size: 190%; font-weight: 600">Form Property</span>
                  <div class="row">
                      <div class="input-field col s12 m6 l6">
                          <input type="text" nid="property_name" v-model="tdatas[1]">
                          <label for="property_name" v-bind:class="{active: tdatas.length>0}">property_name*</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                          <input type="text" id="property_address" v-model="tdatas[2]" >
                          <label for="property_address" v-bind:class="{active: tdatas.length>0}">property_address*</label>
                          
                      </div>
                       <div class="input-field col s12 m4 l4" >
                          <input type="text" id="property_phone" v-model="tdatas[3]">
                          <label for="property_phone" v-bind:class="{active: tdatas.length>0}">property_phone</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="text" id="reservation_email" v-model="tdatas[4]">
                          <label for="reservation_email" v-bind:class="{active: tdatas.length>0}">reservation_email*</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="sales_person" v-model="tdatas[5]">
                          <label for="sales_person" v-bind:class="{active: tdatas.length>0}">sales_person</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="sales_contact" v-model="tdatas[6]">
                          <label for="sales_contact" v-bind:class="{active: tdatas.length>0}">sales_contact</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="sales_email" v-model="tdatas[7]">
                          <label for="sales_email" v-bind:class="{active: tdatas.length>0}">sales_email</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="website" v-model="tdatas[8]">
                          <label for="website" v-bind:class="{active: tdatas.length>0}">website*</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" id="bank_name" v-model="tdatas[9]">
                          <label for="bank_name" v-bind:class="{active: tdatas.length>0}">bank_name</label>
                      </div>
                    
                      <div class="input-field col s12 m4 l4"> 
                          <input type="text" id="bank_account" v-model="tdatas[10]" >
                          <label for="bank_account" v-bind:class="{active: tdatas.length>0}">bank_account</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="text" id="currency" v-model="tdatas[11]">
                          <label for="currency" v-bind:class="{active: tdatas.length>0}">currency</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                          <textarea class="materialize-textarea" id="remark" v-model="tdatas[12]"></textarea>
                          <label for="remark" v-bind:class="{active: tdatas.length>0}">remark</label>
                      </div>
 
                    </div>
                  
                </div>
                <div class="modal-footer">

                  <a  class="modal-action modal-close waves-effect waves-green btn grey" >Close</a>
                  <a class="btn red" @click="destroy(tdatas[0])">Delete</a>
                    <button class="btn cyan" type="submit">
                        SUbmit
                        
                    </button> 
                </div>
            </form>
            </div>
</template>
<template  id="roomForm-template">
    <div id="modalRoom" class="modal modal-fixed-footer" style="min-height: 85%; min-width: 80%">
         
        <form v-on:submit.prevent="sendForm(tdatas[0],type)" action="#" method="post">
                <div class="modal-content">
                  <span style="font-size: 190%; font-weight: 600">Form Room</span><span style="margin-left: 10px;"> <U>@{{tdatas[17]}}</U></span>
                  <div class="row">
                      <div class="input-field col s12 m6 l6">
                          <input type="text" name="room_name" id="room_name" v-model="tdatas[2]">
                          <label for="room_name" v-bind:class="{active: tdatas.length>0}">Room Name</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                          <input type="text" class="dropdown-trigger"  id="property_name_room" v-model="tdatas[17]" data-target="ddPropertyNameRoom">
                          <label for="property_name_room" v-bind:class="{active: tdatas.length>0}">Property Name</label>
                          <ul id="ddPropertyNameRoom" class="dropdown-content">
                            <li v-for="property in properties" @click="newProperty(property.id,property.property_name)"><a>@{{property.property_name}}</a></li>
                          </ul>
                      </div>
                       <div class="input-field col s12 m12 l12" >
                          <textarea class="materialize-textarea" name="room_description" id="room_description" v-model="tdatas[3]"></textarea>
                          <label for="room_description" v-bind:class="{active: tdatas.length>0}">Room Description</label>
                      </div>
                      <div class="input-field col s6 m2 l2">
                          <input type="number" name="room_size" id="room_size" v-model="tdatas[4]">
                          <label for="room_size" v-bind:class="{active: tdatas.length>0}">R.Size</label>
                      </div>
                       <div class="input-field col s6 m2 l2">
                          <input type="number" name="number_bed" id="number_bed" v-model="tdatas[5]">
                          <label for="number_bed" v-bind:class="{active: tdatas.length>0}">NO.Bed</label>
                      </div>
                       <div class="input-field col s6 m2 l2">
                          <input type="number" name="max_adult" id="max_adult" v-model="tdatas[6]">
                          <label for="max_adult" v-bind:class="{active: tdatas.length>0}">Max Adult</label>
                      </div>
                       <div class="input-field col s6 m2 l2">
                          <input type="number" name="max_extra_person" id="extra_person" v-model="tdatas[7]">
                          <label for="extra_person" v-bind:class="{active: tdatas.length>0}">Extra Person</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="text" name="bed_config" id="bed_config" v-model="tdatas[9]">
                          <label for="bed_config" v-bind:class="{active: tdatas.length>0}">Bed Config</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="number" name="extrabed_charge" id="extrabed_charge" v-model="tdatas[8]">
                          <label for="extrabed_charge" v-bind:class="{active: tdatas.length>0}">extraBed</label>
                      </div>
                    
                      <div class="input-field col s12 m4 l4"> 
                          <input type="text" name="typeOfRoom" id="typeOfRoom" class="dropdown-trigger" v-model="tdatas[10]" data-target="ddTypeOfRoom">
                          <label for="typeOfRoom" v-bind:class="{active: tdatas.length>0}">typeOfRoom</label>
                           <ul id='ddTypeOfRoom' class='dropdown-content'>
                            <li><a @click="getType('1 bedroom villa')">One Bedroom Villa</a></li>
                            <li><a @click="getType('2 bedroom villa')">Two Bedroom Villa</a></li>
                            <li><a @click="getType('3 bedroom villa')">Three Bedroom Villa</a></li>
                            <li><a @click="getType('4 bedroom villa')">Four Bedroom Villa</a></li>
                            <li><a @click="getType('5 bedroom villa')">Five Bedroom Villa</a></li>
                          </ul>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="number" name="rateLowSeason" id="rateLowSeason" v-model="tdatas[11]">
                          <label for="rateLowSeason" v-bind:class="{active: tdatas.length>0}">rateLowSeason</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="number" name="rateHightSeason" id="rateHightSeason" v-model="tdatas[12]">
                          <label for="rateHightSeason" v-bind:class="{active: tdatas.length>0}">rateHightSeason</label>
                      </div>
                      <div class="input-field col s12 m4 l4">
                          <input type="number" name="ratePeakSeason" id="ratePeakSeason" v-model="tdatas[13]">
                          <label for="ratePeakSeason" v-bind:class="{active: tdatas.length>0}">ratePeakSeason</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                          <textarea class="materialize-textarea" name="rate_remark" id="rate_remark" v-model="tdatas[14]"></textarea>
                          <label for="rate_remark" v-bind:class="{active: tdatas.length>0}">rate_remark</label>
                      </div>
 
                    </div>
                  
                </div>
                <div class="modal-footer">

                  <a  class="modal-action modal-close waves-effect waves-green btn grey" >Close</a>
                  <a class="btn red" @click="destroy(tdatas[0])">Delete</a>
                    <button class="btn cyan" type="submit">
                        SUbmit
                        
                    </button> 
                </div>
            </form>
            </div>
</template>
<template id="sobForm-template">
            <div id="modalSob" class="modal modal-fixed-footer" style="max-height: 70%;">
              <form v-on:Submit.prevent="sendForm(tdatas[0],type)" action="#" method="post">
                <div class="modal-content">
                  <h4>Form SOB</h4>
                  
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                          <input type="text" name="sob_name" id="sob_name" v-model="tdatas[1]">
                          <label for="sob_name" v-bind:class="{active:tdatas.length>0}">SOB Name</label>
                      </div>
                       <div class="input-field col s12 m6 l6">
                          <input type="text" name="sob_website" id="sob_website" v-model="tdatas[2]">
                          <label for="sob_website" v-bind:class="{active:tdatas.length>0}">sob_website</label>
                      </div>

                       <div class="input-field col s12 m4 l4">
                          <input type="text" name="sob_contact_person" id="sob_contact_person" v-model="tdatas[3]">
                          <label for="sob_contact_person" v-bind:class="{active:tdatas.length>0}">sob_contact_person</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="number" name="sob_phone" id="sob_phone" v-model="tdatas[4]">
                          <label for="sob_phone" v-bind:class="{active:tdatas.length>0}">sob_phone</label>
                      </div>
                       <div class="input-field col s12 m4 l4">
                          <input type="email" name="sob_email" id="sob_email" v-model="tdatas[5]">
                          <label for="sob_email" v-bind:class="{active:tdatas.length>0}">sob_email</label>
                      </div>

                       <div class="input-field col s12 m6 l6">
                          <input type="email" name="cs_email" id="cs_email" v-model="tdatas[6]">
                          <label for="cs_email" v-bind:class="{active:tdatas.length>0}">cs_email</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                          <input type="text" name="cs_phone" id="cs_phone" v-model="tdatas[7]">
                          <label for="cs_phone" v-bind:class="{active:tdatas.length>0}">cs_phone</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                          <textarea class="materialize-textarea" id="remark" v-model="tdatas[8]"></textarea>
                          <label for="remark" v-bind:class="{active:tdatas.length>0}">remark</label>
                      </div>
 
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <a  class="modal-action modal-close waves-effect waves-green btn grey">Close</a>
                  <a @click="destroy(tdatas[0])" class="btn red">Delete</a>
                  <button type="submit" class="btn cyan">SUbmit</button>
                </div></form>
            </div> 
</template>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script type="text/javascript" src="js/myapp.js"></script>
<script type="text/javascript">



var myapp=new Vue({
  el: '#pms-trv',
  data: () => ({
        curentMenu:"dashboard",
        headers: [],
        datas:[],
        data:[],
        rooms:[],
        sobs:[],
        typeRes:'new',
        properties:[],
        reservations:[],
        folio:false
    }),
    methods:{
        getData(source){
            this.headers= [];
            this.datas=[];
            this.data=[];
            this.rooms=[];
            this.sobs=[];
            this.typeRes='new';
            this.properties=[];
            this.reservations=[];
            fetch('api/travel/v1/'+source)
            .then(newData=>newData.json())
            .then(newData=>{
                this.datas=newData.data;
                this.headers=newData.header;
                if(source==='reservation'){
                  this.rooms=newData.rooms;
                  this.sobs=newData.sobs;
                }
                if(source==='room'){
                  this.properties=newData.properties;
                }
                if(source==='payment'){
                  this.properties=newData.properties;
                  this.reservations=newData.reservations;
                }
                if(source='calender'){
                  this.datas=Object.values(this.datas);
                }
            }); 
            m_in.close();
        }

        
    },
    computed:{
        currentMenuConponent:function(){
            return 'menu-'+this.curentMenu.toLowerCase();
        },
        currentForm:function(){
            return 'form-'+this.curentMenu.toLowerCase();
        }
    }
});
var sidenavDD = document.querySelector('#collapsibleRes');
var sidenavDD_instance = M.Collapsible.init(sidenavDD);
var sidenavDD1 = document.querySelector('#collapsibleMaster');
var sidenavDD_instance1 = M.Collapsible.init(sidenavDD1);

//res
var modalRes= document.querySelector('#modalRes');
var modalRes_instance = M.Modal.init(modalRes);
var ddRoomN = document.querySelector('#room_name_res');
var ddRN_instance = M.Dropdown.init(ddRoomN, {constrainWidth: true});
var ddSobName = document.querySelector('#sob_name_res');
var ddSobN_instance =M.Dropdown.init(ddSobName, {constrainWidth: true});
var ddStatusRes = document.querySelector('#status_res');
var ddStatus_instance=M.Dropdown.init(ddStatusRes, {constrainWidth: true});

//calender
var tabCalender=document.querySelector('.tabs')
var tabCalender_instance = M.Tabs.init(tabCalender);

//payment
var modalpayment= document.querySelector('#modalPayment');
var modalPayment_instance = M.Modal.init(modalpayment);
var ddGNPayment = document.querySelector('#guest_name_payment');
var ddGNPayment_instance=M.Dropdown.init(ddGNPayment, {constrainWidth: true});
var ddPPayment = document.querySelector('#property_name_payment');
var ddPPayment_instance=M.Dropdown.init(ddPPayment, {constrainWidth: true});
var ddPaymentType = document.querySelector('#payment_type');
var ddPaymentType_instance=M.Dropdown.init(ddPaymentType, {constrainWidth: true});
var ddPaymentMethod = document.querySelector('#payment_method');
var ddPaymentMethod_instance=M.Dropdown.init(ddPaymentMethod, {constrainWidth: true});

//property
var modalProperty= document.querySelector('#modalProperty');
var modalProperty_instance = M.Modal.init(modalProperty);

//room
var modalRoom= document.querySelector('#modalRoom');
var modalRoon_instance = M.Modal.init(modalRoom); 
var ddR = document.querySelector('#typeOfRoom');
var ddR_instance = M.Dropdown.init(ddR, {constrainWidth: true});
var ddPropertyR = document.querySelector('#property_name_room');
var ddPropertR_instance = M.Dropdown.init(ddPropertyR, {constrainWidth: true});



//sob
var modalSob= document.querySelector('#modalSob');
var modalSob_instance = M.Modal.init(modalSob);

var menu = document.querySelector('.sidenav');
var m_in = M.Sidenav.init(menu, '');
var elem = document.querySelector('.dropdown-trigger');
var instance = M.Dropdown.init(elem, {constrainWidth: false});
let dM = document.querySelector('.dd-master');
let dM_in = M.Dropdown.init(dM,''); 



</script>

<script type="text/x-template" id="reservation-template">
    <div id="myRoom">
        <h2>Reservation</h2>
        <button class="btn cyan z-depth-2" @click="newRes">New Reservation</button>
        <div style="overflow-x: auto;">
         <table >
                  <thead>
                    <th v-for="header in headers">@{{header.text}}</th>
                  </thead>
                  <tbody>
                      <tr v-for="data in tdatas" v-on:click="editData(data)" >
                          <td>@{{data.guest_name}}</td>
                          <td>@{{data.check_in}}</td>
                          <td>@{{data.check_out}}</td>
                          <td>@{{data.rate_usd}}</td>
                          <td>@{{data.property_name}}</td>
                          <td>@{{data.room_name}}</td>
                          <td>@{{data.sob_name}}</td>
                      </tr>
                  </tbody>
              </table>
        </div>      
    </div>
</script>
<template id="calender-template">
  <div id="tCalender">
    <h3>Calendar</h3>
   
    <div v-if="curentTab==='calender'">
      <div style="overflow-x: auto;">
      <table class="tableCalender">
          <thead>
            <th style="min-width: 120px;"></th>
            <th v-for="date in headers">@{{formatDate(date)}}</th>
          </thead>
          <tbody>
            <tr v-for="idx in tdatas">
              <td><b class="truncate">@{{idx.header.head}}</b></td>
              <td v-for="val in idx.data" v-bind:class="{red:val.data.length!=10}" :title="val.data.guest_name" ></td>
            </tr>
          </tbody>
      </table>
    </div>
    </div>
  </div>
</template>
<template id="payment-template">
  <div id="myPayment">
        <h2>Payment</h2>
        <button class="btn cyan" @click="newPayment">New Payment</button>
        <div style="overflow-x: auto;">
         <table class="">
                  <thead>
                    <th v-for="header in headers">@{{header.text}}</th>
                  </thead>
                  <tbody>
                      <tr v-for="data in tdatas" v-on:click="editData(data)" >
                          <td>@{{data.guest_name}}</td>
                          <td>@{{data.property_name}}</td>
                          <td>@{{data.payment_type}}</td>
                          <td>@{{data.bank_name}}</td>
                          <td>@{{data.amount}}</td>
                          <td>@{{data.balance}}</td>
                          <td>@{{data.remark}}</td>
                      </tr>
                  </tbody>
              </table>
        </div>       
    </div>
</template>
<script type="text/x-template" id="property-template">
    <div id="myProperty">
        <h4>Master / Property</h4>
        <button class="btn cyan" @click="newProperty">New Property</button>
        <div style="overflow-x: auto;">
         <table class="">
                  <thead>
                    <th v-for="header in headers">@{{header.text}}</th>
                  </thead>
                  <tbody>
                      <tr v-for="data in tdatas" v-on:click="editData(data)" >
                          <td>@{{data.property_name}}</td>
                          <td><a :href="'http://'+data.website" target="_BLANK"><i class="material-icons">public</i></a></td>
                          <td>@{{data.reservation_email}}</td>
                          <td>@{{data.sales_person}}</td>
                          <td>@{{data.sales_contact}}</td>
                          <td>@{{data.sales_email}}</td>
                      </tr>
                  </tbody>
              </table>
        </div>       
    </div>
</script>
<script type="text/x-template" id="room-template">
    <div id="myRoom">
        <h4>Master / Room</h4>
        <button class="btn cyan" @click="newRoom">New Room</button>
        <div style="overflow-x: auto;">
         <table class="">
                  <thead>
                    <th v-for="header in headers">@{{header.text}}</th>
                  </thead>
                  <tbody>
                      <tr v-for="data in tdatas" v-on:click="editData(data)" >
                          <td>@{{data.room_name}}</td>
                          <td>@{{data.property_name}}</td>
                          <td>@{{data.number_bed}}</td>
                          <td>@{{data.rateLowSeason}}</td>
                          <td>@{{data.rateHightSeason}}</td>
                          <td>@{{data.ratePeakSeason}}</td>
                      </tr>
                  </tbody>
              </table>
        </div>     
    </div>
</script>
<script type="text/x-template" id="sob-template">
    <div id="myRoom">
        <h4>Master / SOB</h4>
        <button class="btn cyan" @click="newSob">New SOB</button>
        <div style="overflow-x: auto;">
         <table class="">
                  <thead>
                    <th v-for="header in headers">@{{header.text}}</th>
                  </thead>
                  <tbody>
                      <tr v-for="data in tdatas" v-on:click="editData(data)" >
                          <td>@{{data.sob_name}}</td>
                          <td>@{{data.sob_contact_person}}</td>
                          <td>@{{data.sob_email}}</td>
                          <td>@{{data.cs_email}}</td>
                          <td>@{{data.cs_phone}}</td>
                          <td>@{{data.sob_website}}</td>
                      </tr>
                  </tbody>
              </table>
        </div>      
    </div>
</script>

</body>
</html>

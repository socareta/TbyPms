Vue.prototype.$http = axios;

Vue.component('menu-dashboard',{
    template:'<div><h2>dasboard</h2></div>',
    props:{
    	tdatas:Array,
    	headers:Array
    }
})
Vue.component('menu-reservation',{
    template:'#reservation-template',
    props:{
    	tdatas:Array,
    	headers:Array,
        folio:false,
        styleObject: {
            display: 'block'
          }
    },
    methods:{
    	editData(data){
            myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalRes_instance.open(); 
        },
        newRes(){
            myapp.data=[];
            myapp.typeRes="new";
            modalRes_instance.open(); 
        }

    }
})
Vue.component('menu-calendar-booking',{
    template:'#calender-template',
    props:{
    	tdatas:Array,
    	headers:Array
    },
    data:function(){
        return{
            curentTab:'calender',
            tabs:['calender','chart']
        }
    },
    methods:{
        formatDate:function(date){
            
            return  moment(date).format('D MMM');
        },
        title:function(data){
            var str="";
            for(val in data){
                str+=val+":"+val.guest_name;

            }
            return str;
        }
    }
})
Vue.component('menu-payment',{
    template:'#payment-template',
    props:{
    	tdatas:Array,
        headers:Array
    },
    methods:{
        editData(data){
            myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalPayment_instance.open(); 
        },
        newPayment(){
            myapp.data=[];
            myapp.typeRes="new";
            modalPayment_instance.open(); 

        }
    }
})
Vue.component('menu-folio',{
    template:'#reservation-template',
    props:{
        tdatas:Array,
        headers:Array,
        folio:true,
        styleObject: {
            display: 'none'
          }
    },
    methods:{
        editData(data){
            myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalRes_instance.open(); 
        },
        newRes(){
            myapp.data=[];
            myapp.typeRes="new";
            modalRes_instance.open(); 
        }

    }
})
Vue.component('menu-property',{
    template:'#property-template',
    props:{
    	tdatas:Array,
    	headers:Array
    },
    methods:{
    	editData(data){
            myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalProperty_instance.open(); 
        },
        newProperty(){
            myapp.data=[];
            myapp.typeRes="new";
            modalProperty_instance.open(); 

        }
    }
})
Vue.component('menu-room',{
    template:'#room-template',
    props:{
    	tdatas:Array,
    	headers:Array
    },
    methods:{
    	editData(data){
           	myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalRoon_instance.open(); 
        },
        newRoom(){
            myapp.data=[];
            myapp.typeRes="new";
            modalRoon_instance.open(); 

        }
    }
})
Vue.component('menu-sob',{
    template:'#sob-template',
    props:{
    	tdatas:Array,
    	headers:Array
    },
    methods:{
    	editData(data){
            myapp.data=Object.values(data);
            myapp.typeRes="edit";
            modalSob_instance.open();
        },
        newSob(){
            myapp.data=[];
            myapp.typeRes="new";
            modalSob_instance.open();
        }
    }
})





Vue.component('form-dashboard',{
    template:'<div><h2>dasboard</h2></div>',
    props:{
    	tdatas:Array,
    	headers:Array
    }
})
Vue.component('form-reservation',{
    template:'#resForm-template',
   	props:{
    	tdatas:Array,
    	rooms:Array,
        sobs:Array,
        type:String
    },
    methods:{
    	sendForm(data,type){
            //console.log(type);
            if(type==='edit')
            {
    		axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation/'+data, {
                data: this.tdatas
              })
              .then(function (response) {
               myapp.getData('reservation');
              })
              .catch(function (error) {
                console.log(error);
              });
              M.toast({html: 'Data Was Update succefully!',classes:'cyan'})
            }
            if(type==='new'){
                /*console.log(this.tdatas);*/
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation', {
                data: this.tdatas
                  })
                  .then(function (response) {
                    myapp.getData('reservation');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                 M.toast({html: 'Data Was Saved succefully!',classes:'cyan'})
            } 
            modalRes_instance.close();
    	},
        newRoom(data,name){
            document.getElementById('room_name_res').value=name;
            this.tdatas[1]=data;
            this.tdatas[16]=name;
        },
        newSob(data,name){
            document.getElementById('sob_name_res').value=name;
            this.tdatas[2]=data;
            this.tdatas[17]=name;
        },
        newStatus(data){
            document.getElementById('status_res').value=data;
            this.tdatas[6]=data;
        },
        destroy(data){
            if(confirm('Are you sure to delete this reservation?')){
                axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation/'+data, {
                data: ''
                  })
                  .then(function (response) {
                   myapp.getData('reservation');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
               
            } 
            modalRes_instance.close();
            M.toast({html: 'Data Was Deleted succefully!',classes:'cyan'})
        }
    }
})
Vue.component('form-calendar-booking',{
    template:'<div><h2>Front Desk / Calendar Booking</h2></div>',
    props:{
    	tdatas:Array,
    	headers:Array
    }
})
Vue.component('form-payment',{
    template:'#paymentForm-template',
    props:{
    	tdatas:Array,
        type:String,
        reservations:Array,
        properties:Array
        
    },
    data:function(){
        return {
            rate_contract:0
        }
    },
    methods:{
        sendForm(data,type){
            if(type==='edit'){
                axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/payment/'+data, {data:this.tdatas})
                .then(function(response){
                    myapp.getData('payment');
                })
                M.toast({html:'Data was updated succefully',classes:'cyan'})
            }   
            if(type==='new'){
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/payment', {data:this.tdatas})
                .then(function(response){
                    myapp.getData('payment');
                })
               M.toast({html:'Data was saved succefully',classes:'cyan'})
            }
            modalPayment_instance.close();
        },
        newRes(data,name,rate){
            document.getElementById('guest_name_payment').value=name;
            this.rate_contract=rate;
            this.tdatas[1]=data;
            this.tdatas[12]=name;
        },
        destroy(data){
            if(confirm('Are you sure to delete this payment log?')){
                axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/payment/'+data, {data:this.tdatas})
                .then(function(response){
                    myapp.getData('payment');
                })
                M.toast({html:'Data was deleted succefully',classes:'cyan'})
            }
             modalPayment_instance.close();
        },
        newProperty(data, name,bank){
            document.getElementById('property_name_payment').value=name;
            document.getElementById('bank_name_payment').value=bank;
            this.tdatas[2]=data;
            this.tdatas[5]=bank;
            this.tdatas[13]=name;
        },
        newPaymentType(data){
            document.getElementById('payment_type').value=data;
            this.tdatas[3]=data
        },
        newBalance(){
            
            var b=parseInt(this.rate_contract) - parseInt(this.tdatas[6]);
            //console.log(parseInt(this.rate_contract)+'-'+this.tdatas[5]+"="+parseInt(b));
            document.getElementById('balance').value=b;
            this.tdatas[7]=b;
        },
        newPaymentMethod(data){
            document.getElementById('payment_method').value=data;
            this.tdatas[4]=data;
        }

    }
})
Vue.component('form-folio',{
    template:'#resForm-template',
    props:{
        tdatas:Array,
        rooms:Array,
        sobs:Array,
        type:String
    },
    methods:{
        sendForm(data,type){
            //console.log(type);
            if(type==='edit')
            {
            axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation/'+data, {
                data: this.tdatas
              })
              .then(function (response) {
               myapp.getData('folio');
              })
              .catch(function (error) {
                console.log(error);
              });
              M.toast({html: 'Data Was Update succefully!',classes:'cyan'})
            }
            if(type==='new'){
                /*console.log(this.tdatas);*/
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation', {
                data: this.tdatas
                  })
                  .then(function (response) {
                    myapp.getData('folio');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                 M.toast({html: 'Data Was Saved succefully!',classes:'cyan'})
            } 
            modalRes_instance.close();
        },
        newRoom(data,name){
            document.getElementById('room_name_res').value=name;
            this.tdatas[1]=data;
            this.tdatas[16]=name;
        },
        newSob(data,name){
            document.getElementById('sob_name_res').value=name;
            this.tdatas[2]=data;
            this.tdatas[17]=name;
        },
        newStatus(data){
            document.getElementById('status_res').value=data;
            this.tdatas[6]=data;
        },
        destroy(data){
            if(confirm('Are you sure to delete this reservation?')){
                axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/reservation/'+data, {
                data: ''
                  })
                  .then(function (response) {
                   myapp.getData('reservation');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
               
            } 
            modalRes_instance.close();
            M.toast({html: 'Data Was Deleted succefully!',classes:'cyan'})
        }
    }
})
Vue.component('form-property',{
    template:'#propertyForm-template',
    props:{
    	tdatas:Array,
    	headers:Array,
        type:String
    },
    methods:{
        sendForm(data,type){
            if(type==='edit'){
                axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/property/'+data,{data:this.tdatas})
                .then(function(response){
                    myapp.getData('property');
                })
                M.toast({html:'Data was updated succefully',classes:'cyan'})
            }
            if(type==='new'){
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/property',{data:this.tdatas})
                .then(function(response){
                    myapp.getData('property');
                })
                M.toast({html:'Data was saved succefully',classes:'cyan'})
            }
            modalProperty_instance.close();
        },
        destroy(data){
            if(confirm('Are you sure to delete this property?')){
                axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/property/'+data,{data:''})
                .then(function(response){
                    myapp.getData('property');
                })
                M.toast({html:'Data was delete succefully',classes:'cyan'})
            }
            modalProperty_instance.close()
        }
    }
})
Vue.component('form-room',{
    template:'#roomForm-template',
    props:{
    	tdatas:Array,
    	errors:["", "", "", "", "", "", "", "", "", "", "", "", "",],
        type:String,
        properties:Array

    },
    methods:{
    	getType(data){
    		document.getElementById('typeOfRoom').value=data;
            this.tdatas[10]=data;
    	},
    	sendForm(data,type){
            //console.log(this.tdatas);
    		if(type==="edit"){
                axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/room/'+data, {
                    data: this.tdatas
                  })
                  .then(function (response) {
                    //console.log(response.data);
                   myapp.getData('room');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                M.toast({html: 'Data Was Update succefully!',classes:'cyan'})
            }
    		if (type==='new') {
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/room', {
                    data: this.tdatas
                  })
                  .then(function (response) {
                   myapp.getData('room');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                M.toast({html:'Data Was Saved succefully',classes:'cyan'})
            }
			modalRoon_instance.close();
    	},
    	destroy(data){
    		if(confirm("Are your sure ti delete this room?"))
    		{
    			axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/room/'+data, {
                    data: ''
                  })
                  .then(function (response) {
                   myapp.getData('room');
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                M.toast({html: 'Data Was Deleted succefully!',classes:'cyan'})

    		}
            modalRoon_instance.close();
    	},
        newProperty(data,name){
            document.getElementById('property_name_room').value=name;
            this.tdatas[1]=data;
        }
    }
})
Vue.component('form-sob',{
    template:'#sobForm-template',
    props:{
    	tdatas:Array,
    	headers:Array,
        type:String
    },
    methods:{
        sendForm(data,type){
            //console.log(this.tdatas);
            if(type==='edit'){
                axios.put('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/sob/'+data,{
                    data:this.tdatas
                })
                .then(function(response){
                    myapp.getData('sob');
                })
                .catch(function(error){
                    console.log(error);
                });

                M.toast({html:'Data was updated succefully',classes:'cyan'})
            }
            if(type==='new'){
                axios.post('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/sob',{
                    data:this.tdatas
                })
                .then(function(response){
                    myapp.getData('sob');
                })
                .catch(function(error){
                    console.log(error);
                })
                M.toast({html:'Data was saved succefully',classes:'cyan'})
            }
            modalSob_instance.close();
        },
        destroy(data){
            if(confirm('Are your sure to delete this sob')){
                axios.delete('http://localhost/laravel/tobeasy-travel/public/api/travel/v1/sob/'+data,{data:''})
                .then(function(response){
                    myapp.getData('sob');
                });
            }
            M.toast({html:'Data was deleted succefully',classes:'cyan'})
            modalSob_instance.close();
        }
    }
})


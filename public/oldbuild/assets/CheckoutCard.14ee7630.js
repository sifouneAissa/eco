import _ from"./chooseAddress.92fffddd.js";import f from"./choosePayment.5c2a7742.js";import y from"./ProductCarousel.8d6c2b36.js";import b from"./CartMenu.91a49b30.js";import{g as d,Q as v,f as r,a as o,j as g,t as n,b as a,C as c,o as l}from"./app.af699bdb.js";import{_ as P}from"./_plugin-vue_export-helper.cdc0426e.js";import"https://js.stripe.com/v3/";import"./ProductCard.7256275a.js";const w={components:{chooseAddress:_,choosePayment:f,ProductCarousel:y,CartMenu:b},props:["model"],data(){return{form:d({address_id:null,user_id:this.$page.props.auth,provider:null,paymentInfo:null,email:null,withProduct:null})}},methods:{incrQP(t){this.model.quantity=this.model.quantity+t,this.model.quantity>this.$page.props.product.isA.remain&&(this.model.quantity=this.$page.props.product.isA.remain),this.model.quantity||(this.model.quantity=1)},submit:function(){d({product_id:this.model.id,quantity:this.model.quantity}).transform(s=>({...s})).post(route("addProduct"),{onSuccess:function(){}})},setSelectedAddress(t){t.toCreate?this.form.address_id=t:this.form.address_id=t.id},SelectPaymentMethod(t){const s=v();this.form.provider=t.type,this.form.paymentInfo=t.data,this.form.email=t.data.email,this.form.withProduct={product_id:this.model.id,quantity:this.model.quantity},this.form.post(route("order.store"),{onSuccess:()=>{s.success(this.$t("notifications.success"))},onError:i=>{s.error(i.error)}})},Pay(){this.form.address_id?window.location.href=window.location.href.split("#")[0]+"#payment":window.location.href=window.location.href.split("#")[0]+"#address"}}},S={id:"checkout-payment",class:"offer-dedicated-body mt-4 mb-4 pt-2 pb-2"},q={class:"container"},$={class:"card bg-light rounded"},A={class:"card-header"},C={class:"col-6"},k={key:0,class:"restaurant-detailed-action-btn float-right"},M={class:"count-number row"},Q={class:"row h5"},B=o("i",{class:"icofont-minus"},null,-1),N=[B],V=["value"],E=o("i",{class:"icofont-plus"},null,-1),I=[E],j={class:"col-6 h2"},D={class:"card-body"},F={class:"row"},T={class:"col-6"},z={class:"col-6"};function G(t,s,i,H,m,e){const u=c("chooseAddress"),p=c("choosePayment");return l(),r("div",null,[o("section",S,[o("div",q,[o("div",$,[o("div",A,[o("div",C,[t.$page.props.product.isA.remain?(l(),r("span",k,[o("span",M,[o("div",Q,[o("button",{onClick:s[0]||(s[0]=h=>e.incrQP(-1)),class:"btn btn-outline-secondary btn-sm left dec"},N),o("input",{class:"count-number-input",type:"text",value:t.$page.props.product.quantity,readonly:""},null,8,V),o("button",{onClick:s[1]||(s[1]=h=>e.incrQP(1)),class:"btn btn-outline-secondary btn-sm right inc"},I)])])])):g("",!0)]),o("p",j,n(t.$t("listing.checkout_card.total"))+" : "+n(t.$page.props.currency_code)+" "+n(t.$page.props.product.cprice*t.$page.props.product.quantity),1)]),o("div",D,[o("div",F,[o("div",T,[a(u,{card_class:"col-12",onSetSelectedAddress:e.setSelectedAddress,models:t.$page.props.addresses},null,8,["onSetSelectedAddress","models"])]),o("div",z,[a(p,{smodel:i.model,form:m.form,disable:this.form.address_id===null,onSelectPaymentMethod:e.SelectPaymentMethod},null,8,["smodel","form","disable","onSelectPaymentMethod"])])])])])])])])}const Y=P(w,[["render",G]]);export{Y as default};

import{f as l,a as e,k as a,t,n as o,o as c}from"./app.af699bdb.js";const i={class:"bg-white card mb-4 order-list shadow-sm"},n={class:"gold-members p-4"},r={href:"#"},m={class:"media"},_=["src"],h={class:"media-body"},u={class:"float-right text-info"},b=e("i",{class:"icofont-check-circled text-success"},null,-1),g={class:"mb-2"},f={href:"detail.html",class:"text-black"},x={class:"text-gray mb-1"},y=e("i",{class:"icofont-location-arrow"},null,-1),k={class:"text-gray mb-3"},v=e("i",{class:"icofont-list"},null,-1),w=e("i",{class:"icofont-clock-time ml-2"},null,-1),p={class:"text-dark"},B=e("hr",null,null,-1),O={class:"mb-0 text-black text-primary pt-2"},C=e("span",{class:"text-black font-weight-bold"}," Total Paid:",-1),N={__name:"OrderCard",props:{model:Object},setup(s){return(d,D)=>(c(),l("div",i,[e("div",n,[e("a",r,[e("div",m,[e("img",{class:"mr-4",src:s.model.fimage,alt:"Generic placeholder image"},null,8,_),e("div",h,[e("span",u,[a(t(s.model.delivered_date),1),b]),e("h6",g,[e("a",f,t(s.model.names),1)]),e("p",x,[y,a(" "+t(s.model.user_address.address_line_1)+","+t(s.model.user_address.address_line_2)+", "+t(s.model.user_address.city)+", "+t(s.model.user_address.country),1)]),e("p",k,[v,a(" ORDER "+t(s.model.order_number)+" ",1),w,a(" "+t(s.model.delivered_date),1)]),e("p",p,[a(t(s.model.qnames)+" ",1),e("span",{class:o("badge badge-pill "+(s.model.payment_detail.status==="paid"?"badge-success":"badge-warning"))},t(s.model.payment_detail.status==="paid"?"Paid":"Unpaid"),3)]),B,e("p",O,[C,a(" "+t(d.$page.props.currency_code)+" "+t(s.model.price),1)])])])])])]))}};export{N as default};
import b from"./Listing.c617a6f3.js";import{g,f as i,b as d,a as s,t as e,j as f,k as c,F as r,l as k,C as _,o as n}from"./app.af699bdb.js";import{_ as v}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Categories.cf99979b.js";const $={props:["title"],components:{PListing:b},data(){return{}},mounted(){},watch:{},methods:{setCategory:function(t){return!!(this.$page.props.query&&(t.name===this.$page.props.query.category||t.name===this.$page.props.query))},submit:function(t,a){console.log(t.name),g({query:a.target.checked?t.name:""}).get(route("listing"))}}},w={class:"breadcrumb-osahan pt-5 pb-5 bg-dark position-relative text-center"},y={class:"text-white"},C={class:"text-white-50"},L={key:0,class:"mt-4"},O=s("button",{class:"btn btn-success ml-2"},"Shop more",-1),q=s("button",{class:"btn btn-dark"},"Thank you",-1),N=[O,q],V={class:"section pt-5 pb-5 products-listing"},B={class:"container"},F={class:"row d-none-m"},P={class:"col-md-12"},x={class:"font-weight-bold mt-0 mb-3"},H={class:"h6 mb-0 ml-2"},S={class:"row"},T={class:"col-md-3"},j={class:"filters shadow-sm rounded bg-white mb-4"},D={class:"filters-header border-bottom pl-4 pr-4 pt-3 pb-3"},E={class:"m-0"},z={class:"filters-body"},A={id:"accordion"},G={class:"filters-card border-bottom p-4"},I={class:"filters-card-header",id:"headingOne"},J={class:"mb-0"},K={href:"#",class:"btn-link","data-toggle":"collapse","data-target":"#collapseOne","aria-expanded":"true","aria-controls":"collapseOne"},M=s("i",{class:"icofont-arrow-down float-right"},null,-1),Q={id:"collapseOne",class:"collapse show","aria-labelledby":"headingOne","data-parent":"#accordion"},R={class:"filters-card-body card-shop-filters"},U=["onClick","checked","id"],W=["for"],X={class:"text-black-50"};function Y(t,a,h,Z,ss,l){const p=_("Head"),m=_("PListing");return n(),i(r,null,[d(p,{title:h.title},null,8,["title"]),s("section",w,[s("h1",y,e(t.$t("listing.desc1")),1),s("h6",C,e(t.$t("listing.desc2")),1),t.$page.props.thanks?(n(),i("div",L,N)):f("",!0)]),s("section",V,[s("div",B,[s("div",F,[s("div",P,[s("h4",x,[c(e(t.$t("listing.offers"))+" ",1),s("small",H,e(t.$page.props.count)+" "+e(t.$t("listing.products")),1)])])]),s("div",S,[s("div",T,[s("div",j,[s("div",D,[s("h5",E,e(t.$t("listing.filter_by")),1)]),s("div",z,[s("div",A,[s("div",G,[s("div",I,[s("h6",J,[s("a",K,[c(e(t.$t("listing.categories"))+" ",1),M])])]),s("div",Q,[s("div",R,[(n(!0),i(r,null,k(t.$page.props.categories,o=>(n(),i("div",{key:o.id,class:"custom-control custom-checkbox"},[s("input",{onClick:u=>l.submit(o,u),checked:l.setCategory(o),type:"checkbox",class:"custom-control-input",id:"cb"+o.id},null,8,U),s("label",{class:"custom-control-label",for:"cb"+o.id},[c(e(o.name)+" ",1),s("small",X,"("+e(o.count)+")",1)],8,W)]))),128))])])])])])])]),d(m)])])])],64)}const ns=v($,[["render",Y]]);export{ns as default};
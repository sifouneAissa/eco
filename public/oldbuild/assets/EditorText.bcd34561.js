import{s as C,G as M,I as O,h as U,x as I,J as P,K as L,M as x,N as S,O as _,c as R,C as z,o as K}from"./app.af699bdb.js";import{_ as N}from"./_plugin-vue_export-helper.cdc0426e.js";var T=["onActivate","onAddUndo","onBeforeAddUndo","onBeforeExecCommand","onBeforeGetContent","onBeforeRenderUI","onBeforeSetContent","onBeforePaste","onBlur","onChange","onClearUndos","onClick","onContextMenu","onCopy","onCut","onDblclick","onDeactivate","onDirty","onDrag","onDragDrop","onDragEnd","onDragGesture","onDragOver","onDrop","onExecCommand","onFocus","onFocusIn","onFocusOut","onGetContent","onHide","onInit","onKeyDown","onKeyPress","onKeyUp","onLoadContent","onMouseDown","onMouseEnter","onMouseLeave","onMouseMove","onMouseOut","onMouseOver","onMouseUp","onNodeChange","onObjectResizeStart","onObjectResized","onObjectSelected","onPaste","onPostProcess","onPostRender","onPreProcess","onProgressState","onRedo","onRemove","onReset","onSaveContent","onSelectionChange","onSetAttrib","onSetContent","onShow","onSubmit","onUndo","onVisualAid"],F=function(n){return T.map(function(t){return t.toLowerCase()}).indexOf(n.toLowerCase())!==-1},G=function(n,t,e){Object.keys(t).filter(F).forEach(function(i){var o=t[i];typeof o=="function"&&(i==="onInit"?o(n,e):e.on(i.substring(2),function(r){return o(r,e)}))})},H=function(n,t,e,i){var o=n.modelEvents?n.modelEvents:null,r=Array.isArray(o)?o.join(" "):o;C(i,function(u,l){e&&typeof u=="string"&&u!==l&&u!==e.getContent({format:n.outputFormat})&&e.setContent(u)}),e.on(r||"change input undo redo",function(){t.emit("update:modelValue",e.getContent({format:n.outputFormat}))})},q=function(n,t,e,i,o,r){i.setContent(r()),e.attrs["onUpdate:modelValue"]&&H(t,e,i,o),G(n,e.attrs,i)},E=0,V=function(n){var t=Date.now(),e=Math.floor(Math.random()*1e9);return E++,n+"_"+e+E+String(t)},W=function(n){return n!==null&&n.tagName.toLowerCase()==="textarea"},w=function(n){return typeof n>"u"||n===""?[]:Array.isArray(n)?n:n.split(" ")},J=function(n,t){return w(n).concat(w(t))},Q=function(n){return n==null},D=function(){return{listeners:[],scriptId:V("tiny-script"),scriptLoaded:!1}},X=function(){var n=D(),t=function(o,r,u,l){var a=r.createElement("script");a.referrerPolicy="origin",a.type="application/javascript",a.id=o,a.src=u;var s=function(){a.removeEventListener("load",s),l()};a.addEventListener("load",s),r.head&&r.head.appendChild(a)},e=function(o,r,u){n.scriptLoaded?u():(n.listeners.push(u),o.getElementById(n.scriptId)||t(n.scriptId,o,r,function(){n.listeners.forEach(function(l){return l()}),n.scriptLoaded=!0}))},i=function(){n=D()};return{load:e,reinitialize:i}},Y=X(),Z=function(){return typeof window<"u"?window:global},f=function(){var n=Z();return n&&n.tinymce?n.tinymce:null},nn={apiKey:String,cloudChannel:String,id:String,init:Object,initialValue:String,inline:Boolean,modelEvents:[String,Array],plugins:[String,Array],tagName:String,toolbar:[String,Array],modelValue:String,disabled:Boolean,tinymceScriptSrc:String,outputFormat:{type:String,validator:function(n){return n==="html"||n==="text"}}},v=globalThis&&globalThis.__assign||function(){return v=Object.assign||function(n){for(var t,e=1,i=arguments.length;e<i;e++){t=arguments[e];for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&(n[o]=t[o])}return n},v.apply(this,arguments)},en=function(n,t,e,i){return n(i||"div",{id:t,ref:e})},tn=function(n,t,e){return n("textarea",{id:t,visibility:"hidden",ref:e})},on=M({props:nn,setup:function(n,t){var e=n.init?v({},n.init):{},i=O(n),o=i.disabled,r=i.modelValue,u=i.tagName,l=U(null),a=null,s=n.id||V("tiny-vue"),p=n.init&&n.init.inline||n.inline,b=!!t.attrs["onUpdate:modelValue"],h=!0,A=n.initialValue?n.initialValue:"",y="",j=function(c){return b?function(){return r!=null&&r.value?r.value:""}:function(){return c?A:y}},g=function(){var c=j(h),d=v(v({},e),{readonly:n.disabled,selector:"#"+s,plugins:J(e.plugins,n.plugins),toolbar:n.toolbar||e.toolbar,inline:p,setup:function(m){a=m,m.on("init",function(B){return q(B,n,t,m,r,c)}),typeof e.setup=="function"&&e.setup(m)}});W(l.value)&&(l.value.style.visibility=""),f().init(d),h=!1};C(o,function(c){var d;a!==null&&(typeof((d=a.mode)===null||d===void 0?void 0:d.set)=="function"?a.mode.set(c?"readonly":"design"):a.setMode(c?"readonly":"design"))}),C(u,function(c){var d;b||(y=a.getContent()),(d=f())===null||d===void 0||d.remove(a),_(function(){return g()})}),I(function(){if(f()!==null)g();else if(l.value&&l.value.ownerDocument){var c=n.cloudChannel?n.cloudChannel:"6",d=n.apiKey?n.apiKey:"no-api-key",m=Q(n.tinymceScriptSrc)?"https://cdn.tiny.cloud/1/"+d+"/tinymce/"+c+"/tinymce.min.js":n.tinymceScriptSrc;Y.load(l.value.ownerDocument,m,g)}}),P(function(){f()!==null&&f().remove(a)}),p||(L(function(){h||g()}),x(function(){var c;b||(y=a.getContent()),(c=f())===null||c===void 0||c.remove(a)}));var k=function(c){var d;y=a.getContent(),(d=f())===null||d===void 0||d.remove(a),e=v(v({},e),c),_(function(){return g()})};return t.expose({rerender:k}),function(){return p?en(S,s,l,n.tagName):tn(S,s,l)}}});const rn={props:["initValue"],components:{Editor:on},watch:{value:function(n,t){this.$emit("Writing",this.value)}},methods:{},data(){return{value:this.initValue?this.initValue:null,init:{plugins:"lists link image table code help wordcount image code fullscreen",file_picker_types:"image",toolbar:"undo redo | link image | fullscreen | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",image_title:!1,automatic_uploads:!0,paste_data_images:!0,browser_spellcheck:!0,selector:"textarea",file_picker_callback:function(n,t,e){var i=document.createElement("input");i.setAttribute("type","file"),i.setAttribute("accept","image/*"),i.onchange=function(){var o=this.files[0],r=new FileReader;r.onload=function(){var u="blobid"+new Date().getTime(),l=tinymce.activeEditor.editorUpload.blobCache,a=r.result.split(",")[1],s=l.create(u,o,a);l.add(s),n(s.blobUri(),{title:o.name})},r.readAsDataURL(o)},i.click()},setup:function(n){n.on("init",function(t){$(n.getBody().parentNode).bind("drag drop",function(e){})}),n.on("input",function(t){}),n.on("change",function(t){tinymce.triggerSave()})}}}},mounted(){}};function an(n,t,e,i,o,r){const u=z("Editor");return K(),R(u,{"api-key":"q80snsb1dfgow5zr43okczr9tebsv5nbj258jjp1433nlpkb",init:o.init,name:"blog",modelValue:o.value,"onUpdate:modelValue":t[0]||(t[0]=l=>o.value=l)},null,8,["init","modelValue"])}const cn=N(rn,[["render",an]]);export{cn as default};

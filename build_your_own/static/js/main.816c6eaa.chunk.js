(this["webpackJsonpreact-car-configurator"]=this["webpackJsonpreact-car-configurator"]||[]).push([[0],{44:function(e,n,t){},45:function(e,n,t){},46:function(e,n,t){},48:function(e,n,t){},49:function(e,n,t){},50:function(e,n,t){},51:function(e,n,t){},70:function(e,n,t){},71:function(e,n,t){},72:function(e,n,t){},73:function(e,n,t){},75:function(e,n,t){},76:function(e,n){},77:function(e,n,t){"use strict";t.r(n);var i=t(2),l=t.n(i),o=t(36),r=t.n(o),c=(t(44),t(6)),a=t(5),s=t(7),d=t(8),u=t(10),p=t(9),v=[{label:"Freeborn Red (309)",value:"red",price:2500},{label:"Olive",value:"olive",price:2500},{label:"Beige (T451)",value:"beige",price:2500},{label:"Capri Blue (T310)",value:"cblue",price:0},{label:"Nebula Green",value:"ngreen",price:0}],h=[{label:"All black Figured Ash Wood D\xe9cor",value:"all_black",price:0},{label:"Black and white Dark Ash Wood D\xe9cor",value:"black_and_white",price:1500},{label:"Cream Oak Wood D\xe9cor",value:"cream",price:1500}],b=[{key:"g40",name:"Model FJ40",colors:v,interior:[{src:"".concat(".","/interiors/bucket-seats.jpg"),label:"Toyota bucket seats",value:"bucket",price:0},{src:"".concat(".","/interiors/recaro.jpg"),label:"Recaro specialist",value:"recaro",price:0}],accessories:[{src:"".concat(".","/accessories/high-lift-jack.jpg"),label:"Offroad Jacks",value:"jacks",price:0},{src:"".concat(".","/accessories/warn-zeon-8.jpg"),label:"Winch",value:"winch",price:0}],types:[{label:"Long Range Plus",value:"long_range_plus",specs:{range:402,top_speed:155,acceleration_time:3.7},price:69420},{label:"Performance",value:"performance",specs:{range:387,top_speed:163,acceleration_time:2.3},price:91990,benefits:["Quicker acceleration: 0-60 mph in 2.3s","Ludicrous Mode","Enhanced Interior Styling","Carbon fiber spoiler"]},{label:"Plaid",value:"plaid",specs:{range:520,top_speed:200,acceleration_time:2},price:139990,benefits:["Quickest 0-60 mph and quarter mile acceleration of any production car ever","Acceleration from 0-60 mph: <2.0s","Quarter mile: <9.0s","1,100+ horsepower","Tri Motor All-Wheel Drive"]}],interiorColors:h},{key:"g45",name:"Model FJ45",colors:v,interior:[{src:"".concat(".","/interiors/bucket-seats.jpg"),label:"Toyota bucket seats",value:"bucket",price:0},{src:"".concat(".","/interiors/recaro.jpg"),label:"Recaro specialist",value:"recaro",price:0}],accessories:[{src:"".concat(".","/accessories/high-lift-jack.jpg"),label:"Offroad Jacks",value:"jacks",price:0},{src:"".concat(".","/accessories/warn-zeon-8.jpg"),label:"Winch",value:"winch",price:0}],types:[{label:"Long Range Plus",value:"long_range_plus",specs:{range:402,top_speed:155,acceleration_time:3.7},price:69420},{label:"Performance",value:"performance",specs:{range:387,top_speed:163,acceleration_time:2.3},price:91990,benefits:["Quicker acceleration: 0-60 mph in 2.3s","Ludicrous Mode","Enhanced Interior Styling","Carbon fiber spoiler"]},{label:"Plaid",value:"plaid",specs:{range:520,top_speed:200,acceleration_time:2},price:139990,benefits:["Quickest 0-60 mph and quarter mile acceleration of any production car ever","Acceleration from 0-60 mph: <2.0s","Quarter mile: <9.0s","1,100+ horsepower","Tri Motor All-Wheel Drive"]}],interiorColors:h}],j={g40:{car_type:"long_range",model:"g40",color:"red",wheels:"wheel_1",interior_color:"all_black",interior_layout:"five_seat",accesories:"jacks"},g45:{car_type:"long_range",model:"g45",color:"red",wheels:"wheel_1",interior_color:"all_black",interior_layout:"five_seat"}},g=(t(45),t(46),t(1)),f=function(e){Object(u.a)(t,e);var n=Object(p.a)(t);function t(){var e;Object(s.a)(this,t);for(var i=arguments.length,l=new Array(i),o=0;o<i;o++)l[o]=arguments[o];return(e=n.call.apply(n,[this].concat(l))).state={darkMode:!1},e.handleOnChangeMode=function(){e.setState((function(e){return Object(a.a)(Object(a.a)({},e),{},{darkMode:!e.darkMode})}))},e}return Object(d.a)(t,[{key:"render",value:function(){var e=this;this.state.darkMode,"".concat(".","/wwclogo.png");return Object(g.jsx)("div",{className:"menu-container",children:Object(g.jsx)("ul",{className:"menu-nav",children:this.props.items.map((function(n,t){return Object(g.jsx)("li",{onClick:function(){return e.props.onSelectItem(t)},className:e.props.selectedItem===t?"selected":null,children:Object(g.jsx)("h2",{children:n})},n)}))})})}}]),t}(l.a.Component);function m(e){return e.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")}function x(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"included";return isNaN(e)?null:0===e?n:"$".concat(m(e))}t(48),t(22),t(49),t(50);var O=["text","color","image"],y=function(e){var n=e.value,t=void 0===n?"":n,i=e.label,l=void 0===i?"":i,o=e.src,r=void 0===o?"":o,c=e.type,a=void 0===c?"":c,s=e.price,d=void 0===s?"":s,u=e.active,p=void 0!==u&&u,v=e.onSelectOption,h=void 0===v?function(){return null}:v;if(!O.includes(a))return null;var b="option ".concat(a,"-option");p&&(b+=" active");return Object(g.jsx)("div",{role:"button",className:b,onClick:function(){return h(t)},children:function(){switch(a){case"text":return Object(g.jsxs)(g.Fragment,{children:[Object(g.jsx)("span",{children:l}),d?Object(g.jsx)("span",{className:"price",children:d}):null]});case"image":return Object(g.jsx)("img",{src:r,alt:l,title:l});case"color":return Object(g.jsx)("div",{className:t,title:l});default:return null}}()})},k=function(e){var n=e.config,t=void 0===n?null:n,l=e.settings,o=void 0===l?null:l,r=e.onSelectOption,s=void 0===r?function(){return null}:r,d=null===o||void 0===o?void 0:o.reduce((function(e,n){var i;return Object(a.a)(Object(a.a)({},e),{},Object(c.a)({},n.prop,null!==(i=n.options.find((function(e){return e.value===t[n.prop]})))&&void 0!==i?i:[]))}),{});return Object(g.jsx)("div",{className:"settings",children:null===o||void 0===o?void 0:o.map((function(e){var n,l,o,r;return e.options&&0!==e.options.length?Object(g.jsxs)("div",{className:"settings-group",children:[Object(g.jsx)("h3",{children:e.label}),e.disclaimer_1?Object(g.jsx)("p",{className:"settings-group-disclaimer",children:e.disclaimer_1}):null,Object(g.jsx)("div",{className:"settings-options settings-options-".concat(e.type),children:e.options.map((function(n){return Object(i.createElement)(y,Object(a.a)(Object(a.a)({},n),{},{key:n.value,type:e.type,price:x(n.price),active:(null===t||void 0===t?void 0:t[e.prop])===n.value,onSelectOption:function(n){return s(e.prop,n)}}))}))}),"text"!==e.type?Object(g.jsx)("div",{className:"settings-group-label",children:Object(g.jsx)("span",{children:null===d||void 0===d||null===(n=d[e.prop])||void 0===n?void 0:n.label})}):null,(null===d||void 0===d||null===(l=d[e.prop])||void 0===l?void 0:l.benefits)?Object(g.jsxs)("div",{className:"settings-group-benefits",children:[Object(g.jsxs)("p",{children:["Model ",t.model.toUpperCase()," ",d[e.prop].label," includes:"]}),Object(g.jsx)("ul",{children:null===d||void 0===d||null===(o=d[e.prop])||void 0===o||null===(r=o.benefits)||void 0===r?void 0:r.map((function(e,n){return Object(g.jsx)("li",{children:e},n)}))})]}):null,e.disclaimer_2?Object(g.jsx)("p",{className:"settings-group-disclaimer",children:e.disclaimer_2}):null]},e.label):null}))})},w=(t(51),t(17),t(20)),S=t.n(w),_=t(23),M=t.n(_),N=t(37),C=t(4);t(70);var A,P,T,E,F,I=function(){var e=Object(i.useState)(!1),n=Object(C.a)(e,2),t=n[0],l=n[1],o=Object(i.useState)(""),r=Object(C.a)(o,2),c=r[0],a=r[1],s=Object(i.useState)(""),d=Object(C.a)(s,2),u=d[0],p=d[1],v=Object(i.useState)(""),h=Object(C.a)(v,2),b=h[0],j=h[1],f=function(){var e=Object(N.a)(M.a.mark((function e(n){return M.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return l(!0),e.prev=1,e.next=4,S.a.post("http://localhost:4000/",{text:c,name:u,email:b});case 4:e.next=9;break;case 6:e.prev=6,e.t0=e.catch(1),console.error(e.t0);case 9:case"end":return e.stop()}}),e,null,[[1,6]])})));return function(n){return e.apply(this,arguments)}}();return Object(g.jsx)("div",{className:"App",children:t?Object(g.jsx)("h1",{children:"Email Sent"}):Object(g.jsxs)("form",{className:"contact-form",onSubmit:f,children:[Object(g.jsx)("h3",{children:"GET QUOTE"}),Object(g.jsx)("input",{type:"text",id:"name",placeholder:"Full name",value:u,onChange:function(e){return p(e.target.value)}}),Object(g.jsx)("br",{}),Object(g.jsx)("input",{type:"email",id:"email",placeholder:"Email",value:b,onChange:function(e){return j(e.target.value)}}),Object(g.jsx)("br",{}),Object(g.jsx)("textarea",{id:"message",placeholder:"Message",cols:"30",rows:"10",type:"text",value:c,onChange:function(e){return a(e.target.value)}}),Object(g.jsx)("button",{type:"submit",class:"submit",value:"Send Message",children:"Send Message"})]})})},Q=function(e){var n,t,i,l,o,r,c,a=e.config,s=void 0===a?null:a,d=e.models,u=void 0===d?null:d,p=(e.totalPrice,null===u||void 0===u?void 0:u.find((function(e){return(null===e||void 0===e?void 0:e.key)===(null===s||void 0===s?void 0:s.model)}))),v=null===p||void 0===p||null===(n=p.types)||void 0===n?void 0:n.find((function(e){return e.value===(null===s||void 0===s?void 0:s.car_type)})),h=null===p||void 0===p||null===(t=p.colors)||void 0===t?void 0:t.find((function(e){return e.value===(null===s||void 0===s?void 0:s.color)})),b=null===p||void 0===p||null===(i=p.wheels)||void 0===i?void 0:i.find((function(e){return e.value===(null===s||void 0===s?void 0:s.wheels)})),j=null===p||void 0===p||null===(l=p.interior)||void 0===l?void 0:l.find((function(e){return e.value===(null===s||void 0===s?void 0:s.interior)})),f=null===p||void 0===p||null===(o=p.body)||void 0===o?void 0:o.find((function(e){return e.value===(null===s||void 0===s?void 0:s.body)})),m=null===p||void 0===p||null===(r=p.lighting)||void 0===r?void 0:r.find((function(e){return e.value===(null===s||void 0===s?void 0:s.lighting)})),x=null===p||void 0===p||null===(c=p.accessories)||void 0===c?void 0:c.find((function(e){return e.value===(null===s||void 0===s?void 0:s.accessories)}));return Object(g.jsxs)("div",{className:"summary",children:[Object(g.jsxs)("h1",{children:["Your ",null===p||void 0===p?void 0:p.name]}),Object(g.jsxs)("div",{className:"summary-content",children:[Object(g.jsx)("p",{children:"Summary"}),Object(g.jsxs)("ul",{children:[Object(g.jsx)("li",{children:Object(g.jsxs)("span",{children:[null===p||void 0===p?void 0:p.name," ",null===v||void 0===v?void 0:v.label]})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===h||void 0===h?void 0:h.label})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===j||void 0===j?void 0:j.label})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===f||void 0===f?void 0:f.label})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===m||void 0===m?void 0:m.label})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===x||void 0===x?void 0:x.label})}),Object(g.jsx)("li",{children:Object(g.jsx)("span",{children:null===b||void 0===b?void 0:b.label})}),Object(g.jsx)("li",{}),Object(g.jsx)("li",{})]})]}),Object(g.jsx)(I,{})]})},R=(t(71),t(72),function(e){var n=e.items,t=void 0===n?[]:n,i=e.index,l=void 0===i?0:i;e.showPrev,e.showNext,e.onClickPrev,e.onClickNext;return Object(g.jsx)("div",{className:"slideshow",children:t.map((function(e,n){return Object(g.jsx)("div",{className:n===l?"slideshow-slide active":"slideshow-slide",children:Object(g.jsx)("img",{src:e.url,alt:e.alt,className:e.scale?"scale":null})},e.alt)}))})}),W=function(e){Object(u.a)(t,e);var n=Object(p.a)(t);function t(){var e;Object(s.a)(this,t);for(var i=arguments.length,l=new Array(i),o=0;o<i;o++)l[o]=arguments[o];return(e=n.call.apply(n,[this].concat(l))).handleOnClickPrev=function(){var n,t,i=e.index>0?e.index-1:e.props.models.length-1;e.props.onChangeModel(null===(n=e.props.models)||void 0===n||null===(t=n[i])||void 0===t?void 0:t.key)},e.handleOnClickNext=function(){var n,t,i=e.index<e.props.models.length-1?e.index+1:0;e.props.onChangeModel(null===(n=e.props.models)||void 0===n||null===(t=n[i])||void 0===t?void 0:t.key)},e}return Object(d.a)(t,[{key:"index",get:function(){var e,n=this;return null===(e=this.props)||void 0===e?void 0:e.models.findIndex((function(e){var t;return e.key===(null===(t=n.props.config)||void 0===t?void 0:t.model)}))}},{key:"items",get:function(){var e=this;return this.props.models.map((function(n){return{alt:n.name,url:"".concat(".","/cars/model_").concat(n.key,"/model_").concat(n.key,"_").concat(e.props.config.color,"_").concat(e.props.config.wheels,".png")||!1,scale:["g40"].includes(n.key)}}))}},{key:"selectedModel",get:function(){var e=this;return this.props.models.find((function(n){return n.key===e.props.config.model}))}},{key:"selectedType",get:function(){var e,n,t=this;return null===(e=this.selectedModel)||void 0===e||null===(n=e.types)||void 0===n?void 0:n.find((function(e){return e.value===t.props.config.car_type}))}},{key:"render",value:function(){return Object(g.jsx)("div",{className:"preview",children:Object(g.jsx)(R,{items:this.items,index:this.index,showPrev:this.props.showAllModels,showNext:this.props.showAllModels,onClickPrev:this.handleOnClickPrev,onClickNext:this.handleOnClickNext})})}}]),t}(l.a.Component),B=(t(73),function(e){var n=e.interior,t=void 0===n?null:n;return Object(g.jsx)("div",{className:"interior-preview",children:Object(g.jsxs)("svg",{version:"1.1",xmlns:"http://www.w3.org/2000/svg",children:[Object(g.jsx)("defs",{}),Object(g.jsx)("image",{alt:"",title:null===t||void 0===t?void 0:t.label,width:"100%",height:"100%",xmlnsXlink:"http://www.w3.org/1999/xlink",xlinkHref:"".concat(".","/interiors/").concat(null===t||void 0===t?void 0:t.value,".jpeg"),preserveAspectRatio:"xMidYMid slice"})]})})}),D=t(11),J=t(21),z=t(13),L=t(12),q=L.a.nav(A||(A=Object(D.a)(["\n  background: #fff;\n  height: 70px;\n  display: flex;\n  justify-content: space-between;\n  padding: 0.5rem calc((100vw - 1250px) / 2);\n  font-size: 14px;\n  line-height: 26px;\n  margin-top: 30px;\n  margin-bottom: 10px;\n"]))),G=Object(L.a)(z.b)(P||(P=Object(D.a)(["\n  color: #666;\n  display: flex;\n  align-items: center;\n  text-decoration: none;\n  padding: 5px 20px;\n  height: 100%;\n  cursor: pointer;\n  border: 1px solid transparent;\n  border-radius: 30px;\n  font-weight: 600;\n  &.active {\n    color: black;\n    border-color: black;\n  }\n  &:hover {\n    color: black;\n    border-color: black;\n    transition: color 300ms linear;\n  }\n"]))),H=Object(L.a)(z.b)(T||(T=Object(D.a)(["\n  color: #000;\n  display: flex;\n  align-items: center;\n  text-decoration: none;\n  padding: 5px 20px;\n  height: 100%;\n  cursor: pointer;\n  border: 1px solid;\n  border-radius: 30px;\n  color: black;\n  border-color: black;\n  font-weight: 600;\n"]))),U=Object(L.a)(J.a)(E||(E=Object(D.a)(["\n  display: none;\n  color: #000;\n  @media screen and (max-width: 768px) {\n    display: block;\n    position: absolute;\n    top: 0;\n    right: 0;\n    transform: translate(-100%, 75%);\n    font-size: 1.8rem;\n    cursor: pointer;\n  }\n"]))),Y=L.a.div(F||(F=Object(D.a)(["\n  display: flex;\n  align-items: center;\n  margin-right: 190px; \n  @media screen and (max-width: 768px) {\n    display: none;\n  }\n  // padding: 30px;\n  padding-top: 40px;\n  padding-bottom: 10px;\n"]))),X=(t(75),t(76),function(){return Object(g.jsx)(g.Fragment,{children:Object(g.jsxs)(q,{children:[Object(g.jsx)("a",{href:"http://worldwidecruisers.com",children:Object(g.jsx)("img",{src:"".concat(".","/wwclogo.png"),alt:"logo"})}),Object(g.jsx)(U,{}),Object(g.jsxs)(Y,{children:[Object(g.jsx)(G,{as:"a",href:"http://worldwidecruisers.com/",activeStyle:!0,children:"Home"}),Object(g.jsx)(H,{as:"a",href:"http://worldwidecruisers.com/build_your_own",class:"active",activeStyle:!0,children:"Build your own"}),Object(g.jsx)(G,{as:"a",href:"http://worldwidecruisers.com/3-recent-builds",activeStyle:!0,children:"Recent builds"}),Object(g.jsx)(G,{as:"a",href:"http://worldwidecruisers.com/content/4-about-us",activeStyle:!0,children:"About us"}),Object(g.jsx)(G,{as:"a",href:"http://worldwidecruisers.com/contact-us",activeStyle:!0,children:"Contact us"})]})]})})}),$=function(e){Object(u.a)(t,e);var n=Object(p.a)(t);function t(){var e,i;Object(s.a)(this,t);for(var l=arguments.length,o=new Array(l),r=0;r<l;r++)o[r]=arguments[r];return(i=n.call.apply(n,[this].concat(o))).state={currentStep:0,config:null!==(e=null===j||void 0===j?void 0:j.g40)&&void 0!==e?e:null},i.goToStep=function(e){i.setState({currentStep:e})},i.goToPrevStep=function(){i.setState((function(e){return{currentStep:e.currentStep>0?e.currentStep-1:e.currentStep}}))},i.goToNextStep=function(){i.setState((function(e){return{currentStep:e.currentStep<i.steps.length-1?e.currentStep+1:e.currentStep}}))},i.handleChangeModel=function(e){i.setState({config:j[e]})},i.handleOnSelectOption=function(e,n){"model"===e?i.handleChangeModel(n):i.setState((function(t){return{config:Object(a.a)(Object(a.a)({},t.config),{},Object(c.a)({},e,n))}}))},i}return Object(d.a)(t,[{key:"selectedModel",get:function(){var e=this;return b.find((function(n){var t;return(null===n||void 0===n?void 0:n.key)===(null===(t=e.state.config)||void 0===t?void 0:t.model)}))}},{key:"steps",get:function(){var e,n,t,i,l,o,r,c,a,s,d,u;return[{name:"Models",settings:[{label:"Select car",type:"text",prop:"model",options:b.map((function(e){return{value:e.key,label:e.name}}))}]},{name:"Features",settings:[{label:"Select color",type:"color",prop:"color",options:null!==(e=null===(n=this.selectedModel)||void 0===n?void 0:n.colors)&&void 0!==e?e:[]},{label:"Select wheels",type:"image",prop:"wheels",options:null!==(t=null===(i=this.selectedModel)||void 0===i?void 0:i.wheels)&&void 0!==t?t:[]},{label:"Select interior",type:"image",prop:"interior",options:null!==(l=null===(o=this.selectedModel)||void 0===o?void 0:o.interior)&&void 0!==l?l:[]},{label:"Select body",type:"image",prop:"body",options:null!==(r=null===(c=this.selectedModel)||void 0===c?void 0:c.body)&&void 0!==r?r:[]},{label:"Select lighting",type:"image",prop:"lighting",options:null!==(a=null===(s=this.selectedModel)||void 0===s?void 0:s.lighting)&&void 0!==a?a:[]},{label:"Select accesories",type:"image",prop:"accessories",options:null!==(d=null===(u=this.selectedModel)||void 0===u?void 0:u.accessories)&&void 0!==d?d:[]}]},{name:"summary"}]}},{key:"render",value:function(){var e,n,t=this,i=0===this.state.currentStep,l=this.state.currentStep===this.steps.length-1;return Object(g.jsxs)("div",{className:"app",children:[Object(g.jsx)(z.a,{children:Object(g.jsx)(X,{})}),Object(g.jsx)(f,{items:this.steps.map((function(e){return e.name})),selectedItem:this.state.currentStep,onSelectItem:this.goToStep}),Object(g.jsxs)("main",{className:"app-content",children:["interior"===(null===(e=this.steps[this.state.currentStep])||void 0===e?void 0:e.name)?Object(g.jsx)(B,{interior:null===(n=this.selectedModel)||void 0===n?void 0:n.interiorColors.find((function(e){return e.value===t.state.config.interior_color}))}):Object(g.jsx)(W,{config:this.state.config,models:b,showAllModels:i,showSpecs:!l,onChangeModel:this.handleChangeModel}),l?Object(g.jsx)(Q,{config:this.state.config,models:b,totalPrice:this.totalPrice}):Object(g.jsx)(k,{config:this.state.config,settings:this.steps[this.state.currentStep].settings,onSelectOption:this.handleOnSelectOption})]})]})}}]),t}(l.a.Component);r.a.render(Object(g.jsx)(l.a.StrictMode,{children:Object(g.jsx)($,{})}),document.getElementById("root"))}},[[77,1,2]]]);
//# sourceMappingURL=main.816c6eaa.chunk.js.map
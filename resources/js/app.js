/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./cart');
require('./lightbox');
require('./like');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
"use strict";
const app = new Vue({
    el: '#app',
});

let imgsSmall = document.querySelectorAll('img.smallImg');
// console.log(imgsSmall);
let imgBig = document.getElementById('big');
// console.log(imgBig);
for (let i=0; i<imgsSmall.length; i++)
	{
	imgsSmall[i].addEventListener('mouseover', function(e){	
		imgBig.setAttribute('src', imgsSmall[i].dataset.srcBig);		
	})
}


let butLike = document.querySelectorAll('.butLike');
let butnotLike = document.querySelectorAll('.butnotLike');
let like = document.querySelectorAll('.like');
// console.log(butnotLike);
// console.log(butLike);
//console.log(like);
for (let i=0; i<like.length; i++)
{
	butnotLike[i].style.display = 'none';	
	
	butLike[i].addEventListener('click', function(e){				
		butnotLike[i].style.display = 'block';
		butLike[i].style.display = 'none';			
	})			
		butnotLike[i].addEventListener('click', function(e){
			butLike[i].style.display = 'block';
			butnotLike[i].style.display = 'none';
	})	
}

let butnotLike2 = document.querySelectorAll('.butnotLike2');
for (let i=0; i<butnotLike2.length; i++)
{		
		butnotLike2[i].addEventListener('click', function(e){			
			butLike[i].style.display = 'block';
			butnotLike2[i].style.display = 'none';				
	})	
}

	
// for (let i=0; i<like.length; i++)
// {
// 	butnotLike[i].classList.add('hide');	
	
// 	butLike[i].addEventListener('click', function(e){
		
// 		butnotLike[i].classList.remove('hide');	
// 		butnotLike[i].classList.add('show');
// 		butLike[i].classList.add('hide');	
// 		butLike[i].classList.remove('show');		
// 	})
			
// 		butnotLike[i].addEventListener('click', function(e){
			
// 			butLike[i].classList.remove('hide');	
// 			butLike[i].classList.add('show');
// 			butnotLike[i].classList.add('hide');	
// 			butnotLike[i].classList.remove('show');		
				
// 	})	

// }
// let butnotLike2 = document.querySelectorAll('.butnotLike2');
// for (let i=0; i<butnotLike2.length; i++)
// {		
// 		butnotLike2[i].addEventListener('click', function(e){
			
// 			butLike[i].classList.add('show');
// 			butnotLike2[i].classList.add('hide');	
// 			butnotLike2[i].classList.remove('show');		
				
// 	})	

// }

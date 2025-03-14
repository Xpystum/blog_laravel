import Tagify from '@yaireo/tagify'

console.log('123');

var inputElem = document.querySelector('input[name=my_project_tagify]');

// var inputElem = document.getElementById('my_project_tagify') // the 'input' element which will be transformed into a Tagify component
var tagify = new Tagify(inputElem)

const ClassicEditor = require( '@ckeditor/ckeditor5-build-classic' )

ClassicEditor
 .create( document.querySelector( '#editor' ) )
 .then( editor => {
  console.log( editor );
 } )
 .catch( error => {
   console.log(error);
});
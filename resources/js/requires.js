window.$  = require( 'jquery' );
window.datatable = require( 'datatables.net' )( window, $ );
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

angular
.module('oquefazer.app', ['ngRoute'])
.config(['$routeProvider',
function config($routeProvider) {

    $routeProvider
    .when('/', {
        templateUrl: '/views/lista.html',
        controller: 'ListaController',
        controllerAs: 'vm'
    })
    .otherwise('/');
}
]).config(['$httpProvider', function ($httpProvider) {
    // Intercept POST requests, convert to standard form encoding
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    // $httpProvider.defaults.headers.post["_token"] = $("input[name='_token']").val();
    $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
        var key, result = [];

        if (typeof data === "string")
        return data;

        for (key in data) {
            if (data.hasOwnProperty(key))
            result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
        }
        return result.join("&");
    });
}]).run(run);

run.$inject = ['$http'];

/**
* @name run
* @desc Update xsrf $http headers to align with Django's defaults
*/
function run($http) {
    $http.defaults.xsrfHeaderName = 'X-CSRFToken';
    $http.defaults.xsrfCookieName = 'csrftoken';
};

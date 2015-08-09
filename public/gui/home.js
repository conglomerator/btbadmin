/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('Home', ['ngRoute', 'Common']).
    constant('HomeProperties', {
        name: 'Home',
        basename: 'home',
        title: 'Home'
    }).
    config(['$routeProvider', 'HomeProperties', function ($routeProvider, HomeProperties) {
        $routeProvider.when('/'+HomeProperties.basename, {templateUrl: 'gui/'+HomeProperties.basename+'.html', caseInsensitiveMatch: true});
        $routeProvider.when('/', {redirectTo: '/'+HomeProperties.basename});
    }]).
    run(['CommonService', 'HomeProperties', function (CommonService, HomeProperties) {
        CommonService.registerModule(HomeProperties);
    }]).
    controller('HomeController', ['HomeProperties', 'CommonService', function (HomeProperties, CommonService) {
        var self = this;
        CommonService.changeCurrentModule(HomeProperties);    
    }]);
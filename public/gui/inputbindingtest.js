/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('InputBindingTest', ['ngRoute', 'Common']).
    constant('InputBindingTestProperties', {
        name: 'InputBindingTest',
        basename: 'inputbindingtest',
        title: 'Input Binding Test',
        category: 'Tests'
    }).
    config(['$routeProvider', 'InputBindingTestProperties', function ($routeProvider, InputBindingTestProperties) {
        $routeProvider.when('/'+InputBindingTestProperties.basename, {templateUrl: 'gui/'+InputBindingTestProperties.basename+'.html', caseInsensitiveMatch: true});
    }]).
    run(['CommonService', 'InputBindingTestProperties', function (CommonService, InputBindingTestProperties) {
        CommonService.registerModule(InputBindingTestProperties);
    }]).
    controller('InputBindingTestController', ['InputBindingTestProperties', 'CommonService', function (InputBindingTestProperties, CommonService) {
        var self = this;
        CommonService.changeCurrentModule(InputBindingTestProperties);    
    }]);
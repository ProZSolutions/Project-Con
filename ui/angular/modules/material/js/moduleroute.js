"use strict";
var materialModule = angular.module('materialModule', []);

 materialModule.config(['$routeProvider', function($routeProvider) {
 	$routeProvider
	.when('/materialList', {
         templateUrl: 'modules/material/views/materialList.html',
         controller: 'materialListController',
    })
 }]);


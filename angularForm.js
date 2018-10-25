var app = angular.module("contact", []);
app.controller("contactForm", [ '$scope', '$http', function($scope, $http) {
	$scope.success = false;
	$scope.error = false;
	$scope.resultMessage;	
	$scope.sendMessage = function(input) {
		//document.getElementById("message").textContent = "";
		var request = $http({
		    method: "post",
		    url: "processForm.php",
		    data: input,
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function (data) {
			$scope.input={};			$scope.resultMessage = data;			alert(data);
		});
	}
} ]);

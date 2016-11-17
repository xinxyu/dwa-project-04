var app = angular.module('retroBoardApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keyup", function (event) {
            if(event.which === 13) {
                event.preventDefault();
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });


            }
        });
    };
});

app.controller('boardCtrl', function($scope) {
    $scope.title = "Test Board";
    $scope.sections = [
        {"name":"What Went Well","notes": ["note2","hello"]},
        {"name":"What Needs Improvement","notes": ["note3","note4","hi"]},
        {"name":"Action Items","notes": ["note5","sample text"]},
        {"name":"Other","notes": ["note6","note7","note8"]}
    ];

    $scope.noteInputs = [];


    $scope.getRows = function() {
        return Array(parseInt(($scope.sections.length+1)/2))
    }

    $scope.addNote = function(index){
        if($scope.noteInputs[index]) {
            $scope.sections[index].notes.push($scope.noteInputs[index]);
        }
        $scope.noteInputs[index] = "";
    }
    $scope.deleteNote = function(sectionIndex,messageIndex){
        if (messageIndex > -1 && sectionIndex > -1) {
            $scope.sections[sectionIndex].notes.splice(messageIndex,1);
        }

    }
});
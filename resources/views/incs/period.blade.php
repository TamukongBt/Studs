
@php
    function PeriodS($PeriodID){

                                      switch ($PeriodID) {
                                      case '1':
                                     echo  '7:00 am';
                                          break;
                                      case '2':
                                      echo  '9:00 am';
                                          break;
                                      case '3':
                                      echo  '11:00 am';
                                          break;
                                      case '4':
                                      echo  '1:00 pm';
                                          break;
                                      case '5':
                                      echo '3:00pm';
                                          break;
                                      case '6':
                                      echo '5:00pm';
                                          break; 
                                      case '7':
                                      echo '7:00am';
                                          break; 
                                      case '8':
                                      echo '9:00am';
                                          break; 
                                      case '9':
                                      echo '11:00am';
                                          break; 
                                      case '10':
                                      echo '1:00pm';
                                          break; 
                                      case '11':
                                      echo '3:00pm';
                                          break; 
                                          default:
                                          echo 'No entry';
                                  }
                                  return 0;
                                } @endphp
@php
    function PeriodE($PeriodID) {
        switch ($PeriodID) {
                            case '1':
                            echo  '9:00 am';
                                break;
                            case '2':
                            echo  '11:00 am';
                                break;
                            case '3':
                            echo  '1:00 pm';
                                break;
                            case '4':
                            echo  '3:00 pm';
                                break;
                            case '5':
                            echo '5:00pm';
                                break;
                            case '6':
                            echo '7:00pm';
                                break;    
                            case '7':
                            echo '11:00am';
                                break; 
                            case '8':
                            echo '1:00pm';
                                break; 
                                case '9':
                            echo '3:00pm';
                                break; 
                                case '10':
                            echo '5:00pm';
                                break; 
                                case '11':
                            echo '7:00pm';
                                break; 
                                default:
                                echo 'No entry';
                             }
                             return 0;
    }
    
@endphp
    

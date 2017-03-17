@extends('layouts.app')

@section('content')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background: url('./images/{{$background}}') no-repeat fixed center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <div class="flex-center position-ref ">

            <div class="content">
                <div class="text-info">
                    <table>
                        <tr>
                            <td colspan="3" align="center">
                                <div id="total_chart"></div>
                                {!! Lava::render('GaugeChart', 'Total', 'total_chart') !!}
                            </td>
                        </tr>
                        <td colspan="3">
                            <div class="title m-b-md">
                                Goal 600 names<br/> 6 Temples<br/> 1 Weekend
                            </div>

                        </td>
                        <tr>
                            <td>
                                <div id="relief_society_chart" class="pull-left"></div>
                                {!! Lava::render('GaugeChart', 'Relief', 'relief_society_chart') !!}
                            </td>
                            <td>
                                <div id="elders_priests_chart" class="push-right"></div>
                                {!! Lava::render('GaugeChart', 'Elders', 'elders_priests_chart') !!}
                            </td>
                            <td>
                                <div id="youth_chart"></div>
                                {!! Lava::render('GaugeChart', 'Youth', 'youth_chart') !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">

                                <div id="male_female_chart"></div>
                                {!! Lava::render('PieChart', 'Sex', 'male_female_chart') !!}
                            </td>
                        </tr>
                        <tr>

                        </tr>
                    </table>





                </div>


            </div>
        </div>

@endsection

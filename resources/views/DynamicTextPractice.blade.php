@extends('MainLayout')
@section('contents')
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div>
                    <form action="web.demo"{{--action="{{route('Service_Providers@Qualification@superadmin')}}"--}} method="post"
                          name="adminForm" class="adminForm">
                        {{csrf_field()}}

                        <table class="table">
                            <thead class="t-head">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Qualification Type</th>
                                <th> Action</th>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="3"> &nbsp;
                                    <input type="button" title="0" name="addSdf" class="btn btn-warning btn-xs"
                                           id="addSdf" value="{{trans('Add More')}}"/>
                                    <input type="submit" title="0" style="margin-left: 10px;display:none;"
                                           class="btn btn-warning btn-xs" name="saveSdf" id="saveSdf"
                                           style="display:none;" value="{{trans('Save')}}"/>
                                    <input type="button" title="0" style="margin-left: 10px;display:none;"
                                           class="btn btn-warning btn-xs" name="cancelSdf" id="cancelSdf"
                                           style="display:none;" value="{{trans('Cancel')}}"/>
                                </td>
                            </tr>
                            </tfoot>
                            <tbody id="socioDemoList">

                                <tr>
                                    <td id="sdflist-a"><input type="checkbox"></td>
                                    <td id="sdfnumber-1">phd</td>
                                    {{--<td align="center" id="sdfbtn-{{$facilities->facility_id}}">--}}
                                    <td id="sdfbtn-1">
                                        <a href="#"
                                           onclick="editSdfGeneral('1','phd')"
                                           class="btn btn-warning btn-xs"><img src="/images/edit-table.png" width="20"
                                                                               height="20" alt="edit"></a>
                                        <a href="#" class="btn btn-danger btn-xs"><img src="/images/delete-table.png"
                                                                                       width="20" height="20"
                                                                                       alt="delete"></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#addSdf").click(function () {
                var title = Number($("#addSdf").attr("title"));
                $("#socioDemoList").append('<tr><td><td> <input type="text" class="form-control"  name="qualification-type" required/></td></td> </tr>');

                $("#addSdf").attr("title", title + 1);
                $("#addSdf").hide();
                $(".sdfedit").hide();
                $("#saveSdf").show();
                $("#cancelSdf").show();

            });
            $("#cancelSdf").click(function () {
                $('#socioDemoList tr:last').remove();
                $("#addSdf").show();
                $(".sdfedit").show();
                $("#saveSdf").hide();
                $("#cancelSdf").hide();
            })
        });
        function editSdfGeneral(id, listNumber) {
//            alert(listNumber);
            $('#sdflist-' + id).html('<input type="hidden" name="id" value="' + id + '"/>');
            $('#sdfnumber-' + id).html('<input type="text" class="form-control"  name="qualification-type" value="' + listNumber + '" />');
            $('#sdfbtn-' + id).html('<input  type="submit" class="btn btn-warning btn-xs" value="save"/>');

            /*   $('.sdfedit').hide();
             $('#addSdf').hide();
             $('.sdfdelete').hide();*/
        }
        ;

        //
        //function delete_id(id)
        //{
        //    alert('fsdafsad');
        //    $.getJSON('index.php?option=com_school&view=sdf&layout=ajax&type=sdfdelete&id='+id,function(data){
        //        alert(data);
        //        //if(confirm('Sure To Remove This Record ?')) {
        //        //    window.location.href = 'index.php?option=com_school&view=sdf&layout=listcreate&Itemid=149?delete_id=' + id;
        //        //}
        //
        //        });
        //
        //
        //}


    </script>
    @endsection
<!--ventana para Update--->
<div class="modal fade" id="lend{{ $book->id }}" tabindex="-1" role="dialog" aria-bs-labelledby="myModalLabel"
    aria-bs-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #023C58 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Prestar libro
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style=""></button>
            </div>
            <form action="{{ route('BorrewedBookSave') }}" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="modal-body" id="cont_modal">
                    <div class="book-share">
                        <img class="book-share__img" src=" {{ $book->cover }}" alt=" {{ $book->id }}">
                        <div class="book-share__description">
                            <input value="{{ $book->id }}" name="book_id" type="hidden">
                            <input type="hidden" name="total" id="total" value="{{$book->stock[0]->total}}">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Título:</strong>
                                    {{ $book->title}}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ISBN:</strong>
                                    {{ $book->isbn }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No páginas:</strong>
                                    {{ $book->pages }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Autor:</strong>
                                    {{ $book->author->name }} {{ $book->author->lastname }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Editorial:</strong>
                                    {{ $book->editorial->name }}
                                </div>
                            </div>

                            <div class="book-share__description__date">
                                <div class="form-group">
                                    <strong>Fecha prestamo:</strong>
                                    <input value="<?php echo date('Y-m-d'); ?>" class="calendar" name="loan_date" type="date">
                                </div>
                                <div class="form-group">
                                    <strong>Fecha entrega:</strong>
                                    <input class="calendar" name="delivery_date" type="date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
            <script>
                $(document).ready(function() {
                    $('#datePicker').val(new Date().toDateInputValue());
                });​
            </script>
        </div>
    </div>
</div>
<!---fin ventana Update --->

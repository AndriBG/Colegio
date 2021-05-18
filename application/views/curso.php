<h1 class="mt-4">Cursos</h1>
<div class="mt-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateCursoModal">
        Añadir
    </button>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre del Curso</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="body-course">
				
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create course-->
<div class="modal fade" id="CreateCursoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-2">
                    <label for="curso">Curso</label>
                    <input type="text" class="form-control" name="curso" id="curso" placeholder="Escriba el nombre del curso">
                    <span class="text-danger mt-4" id="curso_error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="save_course" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit course-->
<div class="modal fade" id="EditCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="cursoEdit" id="EditCourseId" value="">
                <div class="col-md-12 mb-2">
                    <label for="EditCourse">Curso</label>
                    <input type="text" class="form-control" name="EditCourse" id="EditCourseName" placeholder="Escriba el nombre del curso">
                    <span class="text-danger mt-4" id="err_cour_edit"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="update_course" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 py-5">
                <div class="card">
                    <div class="card-header">TO DO LIST</div>

                    <div class="card-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add task</button>
                        </div>
                        <ul class="list-group pt-4">
                            <li class="list-group-item text-uppercase" v-for="task in tasks" :key="task.id">
                                {{ task.title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-task-from">
                        <input type="hidden" name="user_id" :value="user.id">
                        <div class="row">
                            <div class="col-12 form-group">
                                <div class="custom-control custom-radio custom-control-inline" v-for="(task, i) in taskStatus" :key="i">
                                    <input type="radio" name="task_status_id" class="custom-control-input" :value="task.id" :checked="task.name === 'open'">
                                    <label class="custom-control-label" for="task_status_id">{{ task.name }}</label>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label for="title">Title Task</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="col-12 form-group">
                                <label for="description">Descripcion</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="saveTask()">Save task</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['user', 'taskStatus', 'userTasks'],

        data() {
            return {
                tasks: this.userTasks
            }
        },

        methods: {
            saveTask: function() {
                const form = document.getElementById('create-task-from');
                const data = new FormData(form);

                axios.post('/tasks', data).then( response => {
                    this.tasks.push(response.data.task);
                    $('#exampleModal').modal('toggle');
                });
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

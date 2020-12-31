<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ authorName }}</h5>
                        <small>{{ authorEmail }}</small>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ message }}
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" v-if="files">Archivos modificados: {{ files }}</h5>
                        <small v-if="date">{{ date }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            sha: String
        },
        data() {
            return {
                enCerrar: false,
                commitinfo: null,
                authorName: '',
                authorEmail: '',
                message: '',
                date: '',
                files: ''
            }
        },
        mounted() {
            console.log('mounted');
            this.getCommitInfo();
        },
        methods: {
            getCommitInfo(){
                axios.get(`/commit/${this.sha}`)
                .then( (response) => {
                    this.commitinfo = response.data;
                    this.authorName = this.commitinfo.commit.author.name;
                    this.authorEmail = this.commitinfo.commit.author.email;
                    this.message = this.commitinfo.commit.message;
                    this.date = this.commitinfo.commit.author.date;
                    this.files = this.commitinfo.files.length;
                    this.mostrar = true;
                })
                .catch( err => {
                    console.log(err);
                });
                
            },

            cerrar(){
                this.enCerrar = true
                this.authorName = '';
                this.authorEmail = '';
                this.message = '';  
                this.date = '';
                this.files = '';
                this.commitinfo = null;  
            }
        },
        watch:{
            sha(){
                this.getCommitInfo();    
            }    
        }
    }
</script>

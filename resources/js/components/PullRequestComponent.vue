<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ title }}</h5>
                                    <small>{{ author }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="ml-auto">
                                <span class="btn btn-primary btn-sm mr-2" v-if="state=='open'">open</span>
                                <span class="btn btn-warning btn-sm mr-2" v-else-if="merged">merged</span>
                                <span class="btn btn-danger btn-sm mr-2" v-else-if="state=='closed'">closed</span>
                            </div>
                        </div>
                    </div>
                    
                    

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ message }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            number: String
        },
        data() {
            return {
                pullReqinfo: null,
                title: '',
                author: '',
                message: '',
                state: '',
                merged: null
            }
        },
        mounted() {
            this.getPullReq();
        },
        methods: {
            getPullReq(){
                console.log('get');
                axios.get(`/pull-request/${this.number}`)
                .then( (response) => {
                    this.pullReqinfo = response.data;
                    this.title = this.pullReqinfo.title;
                    this.author = this.pullReqinfo.user.login;
                    this.message = this.pullReqinfo.body;
                    this.state = this.pullReqinfo.state;
                    this.merged = this.pullReqinfo.merged_at;
                })
                .catch( err => {
                    console.log(err);
                });
                
            },

            cerrar(){
                this.merged = null;
                this.title = '';
                this.author = '';
                this.message = '';  
                this.state = '';
                this.pullReqinfo = null;  
            }
        },
        watch:{
            number(){
                this.getPullReq();    
            }    
        }
    }
</script>

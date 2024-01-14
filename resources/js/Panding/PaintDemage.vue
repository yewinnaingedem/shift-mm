<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Paint Demage</label>
            </div>
            <div class="col-md-6 text-end">
                <div class="lead font-mono font-size-sm">2 days ago</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.bodyAndPaint"></textarea>
            </div>
            <div class="col-md-5">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" >Send 
                    <span class="position-relative loader" v-if="loading">....</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import demageStore from "./DemageStore.js";
    export default {
        setup () {
            return {
                demageStore
            }
        },
        name : "PaintDemage" ,
        data () {
            return {
                disable : false ,
                loading : true ,
            }
        },
        props : {
            paint : {
                type : String ,
                required : true ,
            },
            fixers : {
                type : Array ,
                required : true ,
            }
        },
        computed : {
            bodyAndPaint () {
                if(this.paint == "none") {
                    demageStore.state.bodyAndPaint = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.bodyAndPaint = this.paint ;
                }
            }
        },
        mounted () {
            this.bodyAndPaint ;
        }
    }
</script>

<style>
    .disable {
        opacity: 0.7;
        cursor: not-allowed !important;
    }
    .loader:before {
        position: absolute;
        content: '';
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #0d6efd;
        animation: loading 1s ease-in-out infinite;
    }
    .loader:before:hover {
        background: #0b5ed7;
    }
    .font-size-sm {
        font-size: 15px;
    }
    @keyframes loading {
            0% {
                width : 100% ;
            }
            50% {
                width: 50%;
            }
            100% {
                width: 0%;
            }
        }
</style>
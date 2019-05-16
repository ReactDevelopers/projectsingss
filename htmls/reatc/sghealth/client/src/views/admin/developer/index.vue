<template>
    <el-row>
        <el-col :span="4">
            <h2>Laravel Command</h2>
             <transition-group
                tag="ul"
                :class="[
                'el-upload-list',
                ]"
                name="el-list1"
            >
                <li :class="['el-upload-list__item']"  v-for="(phpCommand) in phpCommands" :key="`php_command${phpCommand}`">
                    <el-button @click="executePhpCommand(phpCommand)">{{phpCommand}}</el-button>
                </li>
            </transition-group>
            <h2>Composer Commands</h2>
            <transition-group
                tag="ul"
                :class="[
                'el-upload-list',
                ]"
                name="el-list2"
            >
                <li :class="['el-upload-list__item']" v-for="(composerCommand) in composerCommands" :key="`composerCommand${composerCommand}`">
                    <el-button @click="executeComposerCommand(composerCommand)">{{composerCommand}}</el-button>
                </li>
            </transition-group>
            <h2>Node Commands</h2>
            <transition-group
                tag="ul"
                :class="[
                'el-upload-list',
                ]"
                name="el-list3"
            >
                <li :class="['el-upload-list__item']" v-for="(nodeCommand) in nodeCommands" :key="`nodeCommand${nodeCommand}`">
                    <el-button @click="executeNodeCommand(nodeCommand)">{{nodeCommand}}</el-button>
                </li>
            </transition-group>

        </el-col>
        <el-col :span="20">
            <transition-group
                tag="ul"
                :class="[
                'el-upload-list',
                ]"
                name="el-list4"
                v-html="output"
            >
            </transition-group>
        </el-col>
    </el-row>
</template>
<script>
import {executePhp, executeNode, executeComposer} from '@/api/developer';

export default {
    name: 'developer-page',
    data: function () {

        return {
            phpCommands: [
                'migrate',
                'migrate:rollback',
                'migrate:status',
                'lq:client',
                'dump-autoload',
                'site_config:cache',
                'cache:clear',
                'register:route-name',
                'lq:delete-request-log',
            ],
            composerCommands: [
                'update',
                'install',
                'dump-autoload',
            ],
            nodeCommands: [
                'update-plugins',
                'build-admin-local',
                'build-auth-local',
            ],
            output: null
        }
    },
    methods: {

        executePhpCommand: function (command) {

            executePhp({command: command})
                .then((response) => {

                    this.output =  '<li class="el-upload-list__item">'+ response.data.output.replaceAll(/\n/g, "</li><li>")+'</li>';
                })
        },
        executeComposerCommand: function (command) {

            executeComposer({command: command})
                .then((response) => {
                    this.output =  '<li class="el-upload-list__item">'+ response.data.output.replaceAll(/\n/g, "</li><li>")+'</li>';
                })
        },
        executeNodeCommand: function (command) {

            executeNode({command: command})
                .then((response) => {
                    this.output =  '<li class="el-upload-list__item">'+ response.data.output.replaceAll(/\n/g, "</li><li>")+'</li>';
                })
        }
    }
}
</script>


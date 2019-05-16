<template>
  <el-menu class="navbar" mode="horizontal">
	<hamburger :toggle-click="toggleSideBar" :is-active="sidebar.opened" class="hamburger-container"/>
	<breadcrumb />
	<el-dropdown class="avatar-container" trigger="click">
	  <div class="avatar-wrapper">
		  	{{ authProfile ? authProfile.name: '...' }}
			<app-img :url="authProfile && authProfile.profile_image ? authProfile.profile_image.path : undefined"  class="user-avatar" />
			<i class="el-icon-caret-bottom"/>
	  </div>
	  <el-dropdown-menu slot="dropdown" class="user-dropdown">
		<router-link class="inlineBlock" to="/my-profile">
		  <el-dropdown-item>
			My Profile
		  </el-dropdown-item>
		</router-link>
		<router-link class="inlineBlock" to="/my-profile/reset-password">
		  <el-dropdown-item>
			Reset Password
		  </el-dropdown-item>
		</router-link>
		<el-dropdown-item divided v-for="(user) in deviceUsers()" :key="`other_user${user.id}`">
			<label @click="changeUser(user)"> <span>{{user.name}}</span></label>
		</el-dropdown-item>

		<el-dropdown-item divided >
		  <span @click="goToLogin" style="display:block;" >Add Account</span>
		</el-dropdown-item>

		<el-dropdown-item divided>
		  <span style="display:block;" @click="logout">LogOut</span>
		  
		</el-dropdown-item>

	  </el-dropdown-menu>
	</el-dropdown>
  </el-menu>
</template>

<script>
import { mapGetters } from 'vuex'
import Breadcrumb from '@/components/Breadcrumb'
import Hamburger from '@/components/Hamburger'
import { logOutUser} from '@/utils/auth';

export default {
  components: {
	Breadcrumb,
	Hamburger
  },
  computed: {
	...mapGetters([
	  'sidebar',
	  'authProfile'
	])
  },
  methods: {
	toggleSideBar() {
	  this.$store.dispatch('ToggleSideBar')
	},
	logout() {
	  logOutUser()
	},
	deviceUsers: function () {
	  return this.$helper.getProp(this.authProfile, 'device_users', [])
	},
	changeUser: function (user) {
	  
		const {role: {landing_page}, pivot: {login_index}  } = user;
		const url = [ landing_page.replaceAll(/^\/|\/$/g, '') , 'u', login_index ].join('/').replaceAll(/^\/|\/$/g, '');
		window.location.href = url;
	},
	goToLogin: function ( ) {

	  window.location = process.env.VUE_APP_AUTH_URL;
	}
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.navbar {
  height: 50px;
  line-height: 50px;
  border-radius: 0px !important;
  .hamburger-container {
	line-height: 58px;
	height: 50px;
	float: left;
	padding: 0 10px;
  }
  .screenfull {
	position: absolute;
	right: 90px;
	top: 16px;
	color: red;
  }
  .avatar-container {
	height: 50px;
	display: inline-block;
	position: absolute;
	right: 35px;
	.avatar-wrapper {
	  cursor: pointer;
	  margin-top: 5px;
	  position: relative;
	  line-height: initial;
	  .user-avatar {
		width: 40px;
		height: 40px;
		border-radius: 10px;
	  }
	  .el-icon-caret-bottom {
		position: absolute;
		right: -20px;
		top: 25px;
		font-size: 12px;
	  }
	}
  }
}
</style>


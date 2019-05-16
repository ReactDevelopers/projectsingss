const getters = {
  sidebar: state => state.app.sidebar,
  configs: state => state.app.configs,
  device: state => state.app.device,
  authProfile: state => state.profile ? state.profile.profile : null,
  permissions: state => state.profile && state.profile.profile && state.profile.profile.permissions ? state.profile.profile.permissions : [],
}
export default getters

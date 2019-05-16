<script>
export default {
  name: 'MenuItem',
  functional: true,
  props: {
    icon: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    },
    to: {
      type: String,
      default: ''
    },
    currentPath: {
      type: String,
      default: ''
    }
  },
  render(h, context) {
    const { icon, title, to, currentPath } = context.props
    const vnodes = []
    if (icon) {
      vnodes.push(<svg-icon name={icon} color={to ===currentPath? '#294358': '#ffffff'} />)
    }

    if (title) {
      vnodes.push(<span slot='title'>{(title)}</span>)
    }
    return vnodes
  }
}
</script>

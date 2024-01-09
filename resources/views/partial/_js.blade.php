<script type="text/javascript">
  @if(auth()->check())
    const IS_A_USER  = true;
    const USER_GROUP = auth()->user()->user_group;
  @else
    const IS_A_USER  = false;
    const USER_GROUP = 0;
  @endif
  const USER_GROUP_MODER = {{env('USER_GROUP_MODER')}};
</script>
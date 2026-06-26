<div class="mock tilt">
  <span class="gleam"></span>
  <div class="bar"><i></i><i></i><i></i><span class="url"></span></div>
@if($project->screenshot)
  <div class="screen"><img src="{{ $project->screenshot }}" alt="{{ $project->title }} preview" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover;border-radius:inherit"></div>
@else
  @switch($project->visual_variant)
  @case('peach')
    <div class="screen tint-peach">
      <div class="ui-side">
        <div class="ui-col" style="width:34%">
          <div class="ui-block" style="height:22px"></div>
          <div class="ui-block ui-accent" style="height:22px"></div>
          <div class="ui-block" style="height:22px"></div>
          <div class="ui-block" style="height:22px"></div>
        </div>
        <div class="ui-col" style="flex:1">
          <div class="ui-block" style="height:46px"></div>
          <div class="ui-row" style="gap:8px"><div class="ui-block" style="flex:1;height:30px"></div><div class="ui-block" style="flex:1;height:30px"></div></div>
          <div class="ui-block" style="height:46px"></div>
        </div>
      </div>
    </div>
    @break
  @case('cream')
    <div class="screen tint-cream">
      <div class="ui-row"><div class="ui-pill" style="width:100px;height:16px"></div><div class="ui-pill ui-accent" style="width:54px;height:16px;margin-left:auto"></div></div>
      <div class="ui-block" style="height:30px"></div>
      <div class="ui-block" style="height:30px"></div>
      <div class="ui-block" style="height:30px"></div>
      <div class="ui-row" style="gap:8px"><div class="ui-block" style="flex:2;height:26px"></div><div class="ui-block ui-accent" style="flex:1;height:26px"></div></div>
    </div>
    @break
  @case('mauve')
    <div class="screen tint-mauve">
      <div class="ui-row"><div class="ui-pill" style="width:80px;height:15px"></div><div class="ui-pill" style="width:80px;height:15px"></div><div class="ui-pill ui-accent" style="width:60px;height:15px;margin-left:auto"></div></div>
      <div class="ui-grid">
        <div class="ui-col"><div class="ui-block" style="height:40px"></div><div class="ui-block ui-accent" style="height:30px"></div><div class="ui-block" style="height:30px"></div></div>
        <div class="ui-col"><div class="ui-block" style="height:30px"></div><div class="ui-block" style="height:48px"></div></div>
        <div class="ui-col"><div class="ui-block ui-accent" style="height:30px"></div><div class="ui-block" style="height:30px"></div><div class="ui-block" style="height:34px"></div></div>
      </div>
    </div>
    @break
  @default
    <div class="screen tint-rose">
      <div class="ui-row"><div class="ui-pill" style="width:120px;height:18px"></div><div class="ui-pill ui-accent" style="width:64px;height:18px;margin-left:auto"></div></div>
      <div class="ui-block" style="height:80px"></div>
      <div class="ui-grid">
        <div class="ui-block" style="height:64px"></div>
        <div class="ui-block" style="height:64px"></div>
        <div class="ui-block" style="height:64px"></div>
      </div>
      <div class="ui-row"><div class="ui-pill" style="width:90px;height:13px"></div><div class="ui-pill" style="width:50px;height:13px"></div></div>
    </div>
  @endswitch
@endif
</div>

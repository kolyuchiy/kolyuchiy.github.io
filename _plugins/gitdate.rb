module Jekyll
    class GitDateTag < Liquid::Tag
        def render(context)
            path = context['page']['path']
            date = `git log -1 --pretty=format:"%ad" #{path}`
            "#{date}"
        end
    end
end

Liquid::Template.register_tag('git_date', Jekyll::GitDateTag)


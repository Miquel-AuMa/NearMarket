import { publicRoute as route } from '@/router/helpers'

describe('Public route helper', () => {
  it('Basic public route', () => {
    const example = route({ path: '/home', name: 'Home' })

    const keys = Object.keys(example)

    expect(keys).toHaveLength(3)
    expect(keys).toContain('path')
    expect(keys).toContain('name')
    expect(keys).toContain('meta')

    expect(Object.keys(example.meta)).toHaveLength(1)
    expect(Object.keys(example.meta)).toContain('requireAuth')

    expect(example.meta.requireAuth).toBeFalsy()
    expect(example.path).toBe('/home')
    expect(example.name).toBe('Home')
  })

  it('Custom public route route', () => {
    const example = route({ path: '/home', name: 'Home', title: 'some title' })

    const keys = Object.keys(example)

    expect(keys).toHaveLength(4)
    expect(keys).toContain('path')
    expect(keys).toContain('name')
    expect(keys).toContain('title')
    expect(keys).toContain('meta')

    expect(Object.keys(example.meta)).toHaveLength(1)
    expect(Object.keys(example.meta)).toContain('requireAuth')

    expect(example.meta.requireAuth).toBeFalsy()
    expect(example.path).toBe('/home')
    expect(example.title).toBe('some title')
    expect(example.name).toBe('Home')
  })
})
